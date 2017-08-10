<?php
/**
 * Created by PhpStorm.
 * User: yuewen
 * Date: 2017/8/9
 * Time: 上午11:48
 */


class Response {

    const JSON = 'Json';



    /**
     * 按照xml方式输出通信数据
     * @param $code
     * @param string $message
     * @param array $data
     * @return string
     */
    public static function xmlEncoding($code, $message = '', $data = array()) {

        if (!is_numeric($code)){

            return '';
        }


        $result = array(

            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        header("Content_Type:text/html");

        $xml_value = "<?xml verison='1.0' encoding='UTF-8'?>\n";
        $xml_value .= "<root>";
        $xml_value .= self::xmlToEndcode($result);
        $xml_value .= "</root>\n";

        echo $xml_value;
    }


    public static function xmlToEndcode($data = array()){

        $xml = $attr = "";

        foreach ($data as $key => $value){

            if (is_numeric($key)) {

                $attr = "id='{$key}'";
                $key = "item";
            }

            $xml .= "\n<{$key}{$attr}>";
            $xml .= is_array($value) ? self::xmlToEndcode($value) : $value;
            $xml .= "</{$key}>";
        }

        return $xml;
    }

    /**
     *  拼接xml
     */
    public static function xmlValue() {

        header("Content-Type:text/xml");
         $xml_value = "<?xml verison='1.0' encoding='UTF-8'?>";
         $xml_value .= "<root>";
         $xml_value .= "<code>200</code>";
         $xml_value .= "<message>数据返回成功</message>";
         $xml_value .= "<data>";
         $xml_value .= "<id>1</id>";
         $xml_value .= "<name>yuexiaowen</name>";
         $xml_value .= "</data>";
         $xml_value .= "</root>";

         echo $xml_value;
    }


    /*按照json方式输出通信数据*/
    public static function json($code, $message = '', $data = array()) {

        if (!is_numeric($code)) {//如果不是数字，返回空字符串

            return '';
        }

        $result = array(

            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        echo  json_encode($result);
        exit;
    }
}

?>