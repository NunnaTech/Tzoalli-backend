
<?php
use Illuminate\Http\Response;

    function json($status, $message, $data = null, $url = null) {
        return response()->json( array(
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'url' => $url )
        );
    }

	/*public static function setLang($lang) {
        Session::put('lang', $lang);
    }*/
