<?php


namespace App\Http\Controllers;


use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;

class Helper
{
    const CACHE_TIME_LIVE = 60;

    const REQUIRED_NOTE_ORDER = [
        1 => 'Cho xem hàng, không cho thử',
        2 => 'Cho thử hàng',
        3 => 'Không cho xem hàng',
    ];
    const COLLECTION_KEY = [
        'index_inday' => 'Trang chủ - Sản phẩm trong ngày',
        'index_product_new' => 'Trang chủ - Sản phẩm mới',
        'index_product_for_you' => 'Trang chủ - Sản phẩm dành cho khách hàng',
    ];

    const TELCO = [
        'VIETTEL',
        'MOBIPHONE',
        'VINAPHONE',
        'VIETNAMMOBIE'
    ];

    const PAYMENT_TYPE = [
        1 => 'Chuyển khoản',
        2 => 'Thanh toán trực tiếp',
        3 => 'Nhận hàng rồi thanh toán',
        4 => 'Thanh toán online',
    ];

    const STATUS = [
        'pending' => 'Pending payment – Đã nhận được đơn hàng (chưa thanh toán)',
        'on-hold' => 'On-Hold – Đang đợi thanh toán – Kho hàng đã xác nhận',
        'failed' => 'Failed – Thanh toán không thành công hoặc bị từ chối (chưa thanh toán).',
        'processing' => 'Đã nhận thanh toán và kho hàng đã được xác nhận – đơn đặt hàng đang chờ hoàn thành.',
        'cancelled' => 'Được hủy bởi quản trị viên hoặc khách hàng – không yêu cầu thêm hành động nào',
        'completed' => 'Completed – Đơn đặt hàng đã hoàn thành hoàn toàn – không cần phải làm gì nữa.',
    ];

    const TYPE_USER = [
        'Normal', 'Silver', 'Gold',
        'Diamond', 'Poudretteite', 'Benitoite',
        'Musgravite', 'Red Beryl Stone', 'Grandidierite',
        'Painite', 'Emerald Alexandrite', 'Blood Diamond'
    ];

    const BASE_PATH_ADMIN = 'admin' . DIRECTORY_SEPARATOR;
    const BASE_PATH_CLIENT = 'client' . DIRECTORY_SEPARATOR;

    const MESSAGE_NOT_FOUND = 'Dữ liệu không tồn tại!';
    const MESSAGE_CREATE_SUCCESS = 'Thêm mới thành công!';
    const MESSAGE_CREATE_INSUCCESS = 'Thêm mới KHÔNG thành công!';
    const MESSAGE_UPDATE_SUCCESS = 'Cập nhật thành công!';
    const MESSAGE_UPDATE_INSUCCESS = 'Cập nhật KHÔNG thành công!';
    const MESSAGE_DESTROY_SUCCESS = 'Xóa thành công!';
    const MESSAGE_DESTROY_INSUCCESS = 'Xóa KHÔNG thành công!';

    const SORT_BY = [
        'mac-dinh' => 'id desc',
        'gia-tien-tu-thap-den-cao' => 'price asc',
        'gia-tien-tu-cao-xuong-thap' => 'price desc',
        'nhieu-luot-xem-nhat' => 'views desc',
    ];

    public static function genCode()
    {
        $inverted = ~time();

        $hex = dechex($inverted);

        $hex10 = substr($hex, -10, 10);

        $result = strtoupper($hex10);

        return $result;
    }
    public static function callAPI($method, $url, $data = false){
        $curl = curl_init();

        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result) {
            die("Connection Failure");
        }
        curl_close($curl);

        return $result;
    }

    public static function setSEO($model, $nameRoute)
    {
        SEOMeta::setTitle($model->title ?? $model->name);
        SEOMeta::setDescription($model->meta_description);
        SEOMeta::addMeta('article:published_time', $model->created_at->toW3CString(), 'property');
        SEOMeta::setCanonical($model->meta_canonical);
        SEOMeta::addKeyword($model->meta_keywords);

        OpenGraph::setDescription($model->meta_description);
        OpenGraph::setTitle($model->title);
        OpenGraph::setUrl(route($nameRoute, $model->slug));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['vi-VN']);
        OpenGraph::addImage($model->cover);
        OpenGraph::addImage($model->cover);
        OpenGraph::addImage(['url' => $model->cover, 'size' => 300]);
        OpenGraph::addImage($model->cover, ['height' => 300, 'width' => 300]);
    }


    public static function sortByName()
    {
        return [
            'Mặc định',
            'Giá tiền từ thấp đến cao',
            'Giá tiền từ cao xuống thấp',
            'Nhiều lượt xem nhất',
        ];
    }
    public static function findCategory($slug)
    {
        $categories = self::categoryNameProduct();
        foreach ($categories as $categoryID => $name) {
            $cateSlug = Str::slug($name) . '-' . strtoupper(substr(dechex(~$categoryID), -10, 10));

            if (strcmp($cateSlug, $slug) === 0) {
                return $categoryID;
            }
        }
        return null;
    }
    public static function categoryNameProduct()
    {
        return [
            1 => 'Linh vật cầu tài lộc',
            'Linh vật cầu thăng quan tiến chức',
            'Linh vật cầu danh vọng - Sự nghiệp',
            'Linh vật cầu thi cử',
            'Linh vật cầu nhân duyên',
            'Linh vật cầu tự',
            'Linh vật cầu sức khỏe- Bình an',
            'Linh vật bổ trợ Dụng thần',
            'Linh vật hóa giải thị phi',
            'Linh vật hóa giải nhà đất',
            'Đá phong thủy cầu tài lộc',
            'Đá phong thủy cầu thăng quan tiến chức',
            'Đá phong thủy cầu danh vọng - Sự nghiệp',
            'Đá phong thủy cầu thi cử',
            'Đá phong thủy cầu nhân duyên',
            'Đá phong thủy cầu sức khỏe- Bình an',
            'Đá phong thủy bổ trợ Dụng thần',
            'Đá phong thủy hóa giải nhà đất',
            'Đá quý cầu tài lộc',
            'Đá quý cầu thăng quan tiến chức',
            'Đá quý cầu danh vọng - Sự nghiệp',
            'Đá quý cầu thi cử',
            'Đá quý cầu nhân duyên',
            'Đá quý cầu sức khỏe- Bình an',
            'Đá quý bổ trợ Dụng thần',
            'Đá quý hóa giải nhà đất',
            'Tranh phong thủy cầu tài lộc',
            'Tranh phong thủy cầu thăng quan tiến chức',
            'Tranh phong thủy cầu danh vọng - Sự nghiệp',
            'Tranh phong thủy cầu thi cử',
            'Tranh phong thủy cầu nhân duyên',
            'Tranh phong thủy cầu tự',
            'Tranh phong thủy cầu sức khỏe- Bình an',
            'Tranh phong thủy bổ trợ Dụng thần',
            'Tranh phong thủy hóa giải thị phi',
            'Tranh phong thủy hóa giải nhà đất',
            'Trang sức cầu tài lộc',
            'Trang sức cầu thăng quan tiến chức',
            'Trang sức cầu danh vọng - Sự nghiệp',
            'Trang sức cầu thi cử',
            'Trang sức cầu nhân duyên',
            'Trang sức cầu tự',
            'Trang sức cầu sức khỏe- Bình an',
            'Trang sức bổ trợ Dụng thần',
            'Trang sức hóa giải thị phi',
            'Trang sức hóa giải nhà đất',
            'Pháp khí phong thủy',
            'Đồ thờ',
            'Đá cảnh',
            'Các sản phẩm khác',
        ];
    }

    public static function categoryProduct()
    {
        return [
            'Linh vật phong thủy' => [
                1 => 'Linh vật cầu tài lộc',
                'Linh vật cầu thăng quan tiến chức',
                'Linh vật cầu danh vọng - Sự nghiệp',
                'Linh vật cầu thi cử',
                'Linh vật cầu nhân duyên',
                'Linh vật cầu tự',
                'Linh vật cầu sức khỏe- Bình an',
                'Linh vật bổ trợ Dụng thần',
                'Linh vật hóa giải thị phi',
                'Linh vật hóa giải nhà đất'
            ],
            'Đá phong thủy' => [
                11 => 'Đá phong thủy cầu tài lộc',
                'Đá phong thủy cầu thăng quan tiến chức',
                'Đá phong thủy cầu danh vọng - Sự nghiệp',
                'Đá phong thủy cầu thi cử',
                'Đá phong thủy cầu nhân duyên',
                'Đá phong thủy cầu sức khỏe- Bình an',
                'Đá phong thủy bổ trợ Dụng thần',
                'Đá phong thủy hóa giải nhà đất'
            ],
            'Siêu phẩm đá quý' => [
                19 => 'Đá quý cầu tài lộc',
                'Đá quý cầu thăng quan tiến chức',
                'Đá quý cầu danh vọng - Sự nghiệp',
                'Đá quý cầu thi cử',
                'Đá quý cầu nhân duyên',
                'Đá quý cầu sức khỏe- Bình an',
                'Đá quý bổ trợ Dụng thần',
                'Đá quý hóa giải nhà đất'
            ],
            'Tranh phong thủy' => [
                27 => 'Tranh phong thủy cầu tài lộc',
                'Tranh phong thủy cầu thăng quan tiến chức',
                'Tranh phong thủy cầu danh vọng - Sự nghiệp',
                'Tranh phong thủy cầu thi cử',
                'Tranh phong thủy cầu nhân duyên',
                'Tranh phong thủy cầu tự',
                'Tranh phong thủy cầu sức khỏe- Bình an',
                'Tranh phong thủy bổ trợ Dụng thần',
                'Tranh phong thủy hóa giải thị phi',
                'Tranh phong thủy hóa giải nhà đất'
            ],
            'Trang sức phong thủy' => [
                37 => 'Trang sức cầu tài lộc',
                'Trang sức cầu thăng quan tiến chức',
                'Trang sức cầu danh vọng - Sự nghiệp',
                'Trang sức cầu thi cử',
                'Trang sức cầu nhân duyên',
                'Trang sức cầu tự',
                'Trang sức cầu sức khỏe- Bình an',
                'Trang sức bổ trợ Dụng thần',
                'Trang sức hóa giải thị phi',
                'Trang sức hóa giải nhà đất'
            ],
            'Sản phẩm khác' => [
                47 => 'Pháp khí phong thủy',
                'Đồ thờ',
                'Đá cảnh',
                'Các sản phẩm khác',
            ]
        ];
    }

    public static function groupCategoryProduct()
    {
        return [
            'Linh vật phong thủy' => [1, 10],
            'Đá phong thủy' => [11, 18],
            'Siêu phẩm đá quý' => [19, 26],
            'Tranh phong thủy' => [27, 36],
            'Trang sức phong thủy' => [37, 46],
            'Sản phẩm khác' => [47, 50],
        ];
    }

    public static function seoPages()
    {
        return [
            'home' => 'Trang chủ',
            'about' => 'Giới thiệu',
            'policy' => 'Chính sách bảo mật',
            'terms_and_condition' => 'Điều khoản và điều kiện',
            'contact' => 'Liên hệ',
            'products' => 'Danh sách sản phẩm',
            'posts' => 'Danh sách bài viết',
        ];
    }
}
