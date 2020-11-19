<?php


namespace App\Http\Controllers\Client;


use App\Facade\CartFacede;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Http\Controllers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ShoppingCartController extends Controller
{
    public function checkout()
    {
        $cart = CartFacede::content();

        if (empty($cart)) {
            return redirect()->route('client.home')->with('checkout', 'Giỏ hàng trống! Hãy tiếp tục mua sắp!');
        }

        // if(!session()->has('districts')) {
        //     $districts = Helper::callAPI('POST', 'https://console.ghn.vn/api/v1/apiv3/GetDistricts', json_encode(['token' => env('GHN_TOKEN')]));
        //     session()->put('districts', $districts);
        // }

        return view('client.checkout', compact('cart'));
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'qty' => ['required', 'min:1'],
            ]);

            if ($validator->fails()) {
                return response()->json(false, Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $data = $request->qty;

            foreach ($data as $uniqueId => $qty) {
                if ($qty != 0) {
                    CartFacede::update($uniqueId, $qty);
                } else {
                    CartFacede::delete($uniqueId);
                }
            }

            $cart = CartFacede::content();

            if (empty($cart)) {
                return redirect()->route('client.home')->with('success', 'Giỏ hàng trống! Hãy tiếp tục mua sắp!');
            }

            return back()->with('success', 'Cập nhật giỏ hàng thành công!');
        } catch (\Exception $exception) {
            return back()->with('danger', 'Cập nhật giỏ hàng thất bại! ' . $exception->getMessage());
        }
    }

    public function booking(Request $request)
    {
        $cridentials = $request->only(['first_name', 'last_name', 'email', 'phone', 'address',
            'payment_type', 'note', 'bank_transfer_name', 'bank_transfer_account_type', 'bank_transfer_account_name',
            'bank_transfer_swift_code']);

        $validator = Validator::make($cridentials, [
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'email' => 'required|email|string|max:191',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:191',
            'bank_transfer_name' => 'nullable|string|max:191',
            'bank_transfer_account_type' => 'nullable|string|max:191',
            'bank_transfer_account_name' => 'nullable|string|max:191',
            'bank_transfer_swift_code' => 'nullable|string|max:191',
        ]);

        if ($validator->fails()) {
            abort(422);
            exit;
        }

        $cartContent = array_column(CartFacede::content(), 'id');

        $cridentials['product_items'] = $cartContent;
        $cridentials['order_code'] = Helper::genCode();
        $cridentials['subtotal'] = str_replace(',', '', CartFacede::getTotal());
        $cridentials['totals'] = str_replace(',', '', CartFacede::getTotal());

        try {
            DB::beginTransaction();

            $order = Order::create($cridentials);

            $email = $cridentials['email'];
            $name = $cridentials['last_name'] . ' ' . $cridentials['first_name'];
            Mail::send('emails.order', [
                'order' => $order,
                'cart' => CartFacede::content()
            ], function ($message) use ($email, $name, $order) {

                $message->to($email, $name)
                    ->subject('[Phương Đông Phong Thủy] Hóa đơn đặt hàng - Mã Hóa Đơn: ' . $order->order_code);
            });

            Mail::send('emails.order', [
                'order' => $order,
                'cart' => CartFacede::content()
            ], function ($message) use ($email, $name, $order) {

                $message->to(env('MAIL_ME'), 'Phương Đông Phong Thủy')
                    ->subject('[Phương Đông Phong Thủy] Hóa đơn đặt hàng - Mã Hóa Đơn: ' . $order->order_code);
            });

            if (Mail::failures()) {
                throw new \Exception('Xin lỗi! Gửi mail thất bại. Bạn vui lòng đặt lại!');
            }

            DB::commit();

            CartFacede::clear();

            return redirect()->route('client.home')->with('success', 'Đặt hàng thành công! Chúng tôi sẽ liên hệ lại để xác nhận!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('danger', $exception->getMessage());
        }
    }

    public function addItem(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'sku' => ['required', 'string'],
                'qty' => ['required', 'min:1'],
            ]);

            if ($validator->fails()) {
                return response()->json(false, Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $product = Product::isActive()->sku($request->sku)->first();

            if (!$product) {
                return response()->json(false, Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $price = ($product->price_discount > 0) ? $product->price_discount : $product->price;

            CartFacede::add($product->sku, $request->qty, $product->name, $price, [
                'cover' => $product->cover,
                'link' => route('client.product.view', $product->slug),
            ]);

            return response()->json(true, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteItem($uniqueId)
    {
        try {
            CartFacede::delete($uniqueId);

            $cart = CartFacede::content();

            if (empty($cart)) {
                return redirect()->route('client.home')->with('success', 'Giỏ hàng trống! Hãy tiếp tục mua sắp!');
            }

            return redirect()->route('client.shopping-cart.checkout')->with('success', 'Xóa sản phẩm thành công!');
        } catch (\Exception $exception) {
            abort(500);
            exit;
        }
    }

    public function clearCart()
    {
        CartFacede::clear();

        return redirect()->route('client.home')->with('success', 'Giỏ hàng trống! Hãy tiếp tục mua sắp!');
    }
}
