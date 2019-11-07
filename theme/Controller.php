<?php

namespace Theme;
require 'lib/vendor/google/recaptcha/src/autoload.php';
require 'lib/RestClient.php';

use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\Post;
use Theme\Lib\Input;
use Theme\Lib\Validation;

class Controller
{
    protected $messages = array();

    public function __construct()
    {
        $this->messages = array(
            'name' => '{field} ' . 'الزامی است',
            'email' => '{field} ' . 'نا معتبر است',
            'phone' => '{field} ' . 'نا معتبر است',
            'message' => '{field} ' . 'الزامی است',
            'required' => '{field} ' . 'الزامی است',
            'maxLength' => '{field} ' . 'طولانی است',
            'minLength' => '{field} ' . 'کوتاه است',
            'integer' => '{field} ' . 'باید عدد باشد',
            'in' => '{field} ' . 'نا معتبر است',
        );
    }

    public function actionPaymentForm()
    {

        $in = new Input();
        $inputs = $in->all();

        $post = wp_insert_post(array(
            'post_title' => $inputs['session'],
            'post_type' => 'installments',
            'post_status' => 'publish',
            'post_author' => 1
        ));

        $content = json_encode($inputs['inputs']);

        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
            'wp-content' . DIRECTORY_SEPARATOR .
            'themes' . DIRECTORY_SEPARATOR .
            'Arad Payment' . DIRECTORY_SEPARATOR .
            'installments' . DIRECTORY_SEPARATOR . $post . '.txt';

        $fp = fopen($path, "w");
        fwrite($fp, $content);
        fclose($fp);


        wp_send_json(array(
            'success' => true,
            'message' => 'اطلاعات شما با موفقیت ثبت شد. همکاران ما با شما تماس خواهند گرفت.'
        ));
    }

    public function actionFileOneForm()
    {
        $in = new Input();
        $inputs = $in->all();

        if ($_FILES) {
            if ($_FILES['file']['size'] > 1000000) {
                wp_send_json(array(
                    'success' => false,
                    'errors' => $errors['size'] = 'حجم فایل باید کمتر از 10M باشد',
                    'code' => 1
                ));
                die;
            }
            if (!in_array($_FILES['file']['type'], ['image/png', 'image/jpeg'])) {
                wp_send_json(array(
                    'success' => false,
                    'errors' => $errors['file'] = 'فرمت فایل باید jpeg یا png باشد',
                    'code' => 2
                ));
                die;
            }
            $tmp_name = $_FILES['file']["tmp_name"];
            if ($_FILES['file']['type'] == 'image/png') {
                $name = $inputs['session'] . '_1.png';
            } else {
                $name = $inputs['session'] . '_1.jpg';
            }
            $formUploadsDir = wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR . 'formUploads';
            if (!file_exists($formUploadsDir)) {
                wp_mkdir_p($formUploadsDir);
            }
            $fileName = $formUploadsDir . DIRECTORY_SEPARATOR . $name;
            move_uploaded_file($tmp_name, $fileName);

            wp_send_json(array(
                'success' => true,
                'message' => 'ارسال شد'
            ));
        } else {
            wp_send_json(array(
                'success' => false,
                'message' => "لطفا فایل را انتخاب کنید سپس بارگذاری فرمایید.",
                'code' => 1
            ));
            die;

        }
    }

    public function actionFileTwoForm()
    {

        $in = new Input();
        $inputs = $in->all();

        if ($_FILES) {
            if ($_FILES['file']['size'] > 1000000) {
                wp_send_json(array(
                    'success' => false,
                    'errors' => $errors['size'] = 'حجم فایل باید کمتر از 10M باشد',
                    'code' => 1
                ));
                die;
            }
            if (!in_array($_FILES['file']['type'], ['image/png', 'image/jpeg'])) {
                wp_send_json(array(
                    'success' => false,
                    'errors' => $errors['file'] = 'فرمت فایل باید jpeg یا png باشد',
                    'code' => 2
                ));
                die;
            }
            $tmp_name = $_FILES['file']["tmp_name"];
            if ($_FILES['file']['type'] == 'image/png') {
                $name = $inputs['session'] . '_2.png';
            } else {
                $name = $inputs['session'] . '_2.jpg';
            }
            $formUploadsDir = wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR . 'formUploads';
            if (!file_exists($formUploadsDir)) {
                wp_mkdir_p($formUploadsDir);
            }
            $fileName = $formUploadsDir . DIRECTORY_SEPARATOR . $name;
            move_uploaded_file($tmp_name, $fileName);

            wp_send_json(array(
                'success' => true,
                'message' => 'ارسال شد'
            ));
        } else {
            wp_send_json(array(
                'success' => false,
                'message' => "لطفا فایل را انتخاب کنید سپس بارگذاری فرمایید.",
                'code' => 1
            ));
            die;

        }
    }
}

