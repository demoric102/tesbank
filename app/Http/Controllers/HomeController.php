<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function frontPage()
    {
        return view('welcome');
    }


    public function confirmLiveRequest()
    {
        return view('confirm-live-request');
    }
    public function confirmFicoScore()
    {
        return view('confirm-fico-score');
    }
    public function confirmIconPlus()
    {
        return view('confirm-icon-plus');
    }

    public function liveRequest()
    {
        return redirect('/')->with('balance', 'N1000')->with('cost', 'N2000')->with('download', 'allow');
    }

    public function ficoScore()
    {
        return redirect('/')->with('balance', 'N2600')->with('cost', 'N400')->with('fico-download', 'allow');
    }
    public function iconPlus()
    {
        return redirect('/')->with('balance', 'N500')->with('cost', 'N2500')->with('icon-download', 'allow');
    }
    
    public function iconDownload()
    {
        $customer_email = Auth::user()->email;
        $names = Auth::user()->name;
        $gender = Auth::user()->gender;
        $dob = Auth::user()->dob;
        $bvn = Auth::user()->bvn;
        $splited_names = (explode(' ',$names));
        $firstname = $splited_names[0];
        if(count($splited_names) > 2){
            $middlename = $splited_names[1];
            $lastname = $splited_names[2];
            $post_fields = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\ndemoric102@gmail.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"firstname\"\r\n\r\n$firstname\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"middlename\"\r\n\r\n$middlename\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"lastname\"\r\n\r\n$lastname\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"acc_num\"\r\n\r\n0022222221\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"bvn\"\r\n\r\n$bvn\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"phone\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"product_id\"\r\n\r\nCRC003\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"names\"\r\n\r\n$names\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gender\"\r\n\r\n$gender\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"dob\"\r\n\r\n$dob\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"customer_email\"\r\n\r\n$customer_email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--";
        }
        else{
            $lastname = $splited_names[1];
            $post_fields = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\ndemoric102@gmail.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"firstname\"\r\n\r\n$firstname\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"lastname\"\r\n\r\n$lastname\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"acc_num\"\r\n\r\n0022222221\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"bvn\"\r\n\r\n$bvn\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"phone\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"product_id\"\r\n\r\nCRC003\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"names\"\r\n\r\n$names\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gender\"\r\n\r\n$gender\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"dob\"\r\n\r\n$dob\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"customer_email\"\r\n\r\n$customer_email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--";
        }
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "8009",
        CURLOPT_URL => "http://172.16.5.12:8009/api/v1/post/icon",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "$post_fields",
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI1NWI4OTRjN2MxYzI0MTBjNWNiNDYwZDVjMDZhNTQ2ZmRlY2Q1ZDljN2U3NzQxNmI2NTBkZDgwYTc2MzdlZTA3NTAxYzAwMDNmNWIyYjcyIn0.eyJhdWQiOiIzIiwianRpIjoiYjU1Yjg5NGM3YzFjMjQxMGM1Y2I0NjBkNWMwNmE1NDZmZGVjZDVkOWM3ZTc3NDE2YjY1MGRkODBhNzYzN2VlMDc1MDFjMDAwM2Y1YjJiNzIiLCJpYXQiOjE1NDMyMzQ5NjEsIm5iZiI6MTU0MzIzNDk2MSwiZXhwIjoxNTc0NzcwOTYwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.loBUCQXRJPHNMIO_MgN40TJ7UIDwZdfi_5HxqdvTnhdRDtQ7-uZLNuERG7Pm6Cm_wgUxR2emGXnkRnoaG-QbvUNVDTP3LzTzdzfFsCuwD7PgGiUKVIeRBQNzVIN0OIlzDMfCHgkduKJDSGCGVrK8f3jpqeL7h7rUPd6ex-9NxcYriE8pvPcqRzxhm1TV3eZwP6eUK7oFQcVrT8tdGSCCg3bEChp5gCA0aWaQ3DUUcklC6A1UjhprRID3sFdqHJWjqJ5PiMBHp1T8B8qJKCDmlcMn030kLEdhVE0sgdAg9EIHLMxyUBkbx5KskspwmT4sKikgYbutrUSY6mn6-XuTzwF8Ffcq2gm0DJ63tni1wzlQlkywzJoTFkDIUT9wWqIeFhgSWRdHnD7CJcOxLzd5Yn9JQo43lSY1aM2R3c06TLJB5pauMk72gBvFe3NhGPS4GnYGikoJSexzkuXmDq_oTZWg5HKbgredoTaI3RxNamUBwR0RPRh1OjZmZa5ZwjrFzBvKMxOudVVMeqcViAI-SGCTjZu-uvqxJ6fnfAZyh_4xl0EbpJ3AyHZwGuOYy0YWwqxxm00cEknc2o3PxVlgFjmkZPmZC0GUAH1D8tXjT4O-bnogaikG5Pl21S-audpVrAz5h7N6R9RcXUDpYg2S_OD7s2WQYpOVDPw7xkIKW0w",
            "Postman-Token: 1141c83a-e6a1-4e3d-9f2d-0f69120ed2d4",
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return redirect('/')->with('balance', 'N500')->with('cost', 'N2500')->with('inserted', 'Icon Plus Request was succesful');
        }
    }

    public function ficoDownload()
    {
        $destination_email = Auth::user()->email;
        $names = Auth::user()->name;
        $gender = Auth::user()->gender;
        $dob = Auth::user()->dob;
        $bvn = Auth::user()->bvn;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8009",
            CURLOPT_URL => "http://172.16.5.12:8009/api/v1/post/fico-request",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\nademola.adesalu@crccreditbureau.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"dob\"\r\n\r\n$dob\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"names\"\r\n\r\n$names\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gender\"\r\n\r\n$gender\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"destination_email\"\r\n\r\n$destination_email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"acc_num\"\r\n\r\n001\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"bvn\"\r\n\r\n$bvn\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"phone\"\r\n\r\n000\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"product_id\"\r\n\r\nCRC001\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI1NWI4OTRjN2MxYzI0MTBjNWNiNDYwZDVjMDZhNTQ2ZmRlY2Q1ZDljN2U3NzQxNmI2NTBkZDgwYTc2MzdlZTA3NTAxYzAwMDNmNWIyYjcyIn0.eyJhdWQiOiIzIiwianRpIjoiYjU1Yjg5NGM3YzFjMjQxMGM1Y2I0NjBkNWMwNmE1NDZmZGVjZDVkOWM3ZTc3NDE2YjY1MGRkODBhNzYzN2VlMDc1MDFjMDAwM2Y1YjJiNzIiLCJpYXQiOjE1NDMyMzQ5NjEsIm5iZiI6MTU0MzIzNDk2MSwiZXhwIjoxNTc0NzcwOTYwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.loBUCQXRJPHNMIO_MgN40TJ7UIDwZdfi_5HxqdvTnhdRDtQ7-uZLNuERG7Pm6Cm_wgUxR2emGXnkRnoaG-QbvUNVDTP3LzTzdzfFsCuwD7PgGiUKVIeRBQNzVIN0OIlzDMfCHgkduKJDSGCGVrK8f3jpqeL7h7rUPd6ex-9NxcYriE8pvPcqRzxhm1TV3eZwP6eUK7oFQcVrT8tdGSCCg3bEChp5gCA0aWaQ3DUUcklC6A1UjhprRID3sFdqHJWjqJ5PiMBHp1T8B8qJKCDmlcMn030kLEdhVE0sgdAg9EIHLMxyUBkbx5KskspwmT4sKikgYbutrUSY6mn6-XuTzwF8Ffcq2gm0DJ63tni1wzlQlkywzJoTFkDIUT9wWqIeFhgSWRdHnD7CJcOxLzd5Yn9JQo43lSY1aM2R3c06TLJB5pauMk72gBvFe3NhGPS4GnYGikoJSexzkuXmDq_oTZWg5HKbgredoTaI3RxNamUBwR0RPRh1OjZmZa5ZwjrFzBvKMxOudVVMeqcViAI-SGCTjZu-uvqxJ6fnfAZyh_4xl0EbpJ3AyHZwGuOYy0YWwqxxm00cEknc2o3PxVlgFjmkZPmZC0GUAH1D8tXjT4O-bnogaikG5Pl21S-audpVrAz5h7N6R9RcXUDpYg2S_OD7s2WQYpOVDPw7xkIKW0w",
                "Postman-Token: dc8d68d8-61a1-40b5-bc4c-f4a26723eaf7",
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $pdf = PDF::loadView('fico-report', compact('data'));
            return $pdf->download('fico-report.pdf');
        }
    }

    public function download(Request $request)
    {

        $username = '1A0L199999999903';
        $password = 'CRC2018a';
        //$names = 'YEKINI OJO ISKILU';
        //$gender = '001';
        //$dob = '13-Apr-1983';
        $email = 'automations@crccreditbureau.com';
        $bvn = Auth::user()->bvn;
        $phone = '44555555555';
        $product_id = 'CRC001';
        $acc_num = '444445555555';
        $destination_email = Auth::user()->email;
        $names = Auth::user()->name;
        if (Auth::user()->gender == 'Male'){
            $gender = '001';
        }
        else{
            $gender = '002';
        }
        $dob = Auth::user()->dob;



        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8009",
            CURLOPT_URL => "http://172.16.5.12:8009/api/v1/post/live-request",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\n$email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"destination_email\"\r\n\r\n$destination_email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"acc_num\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"names\"\r\n\r\n$names\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"dob\"\r\n\r\n$dob\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gender\"\r\n\r\n$gender\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"bvn\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"phone\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"product_id\"\r\n\r\nCRC001\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI1NWI4OTRjN2MxYzI0MTBjNWNiNDYwZDVjMDZhNTQ2ZmRlY2Q1ZDljN2U3NzQxNmI2NTBkZDgwYTc2MzdlZTA3NTAxYzAwMDNmNWIyYjcyIn0.eyJhdWQiOiIzIiwianRpIjoiYjU1Yjg5NGM3YzFjMjQxMGM1Y2I0NjBkNWMwNmE1NDZmZGVjZDVkOWM3ZTc3NDE2YjY1MGRkODBhNzYzN2VlMDc1MDFjMDAwM2Y1YjJiNzIiLCJpYXQiOjE1NDMyMzQ5NjEsIm5iZiI6MTU0MzIzNDk2MSwiZXhwIjoxNTc0NzcwOTYwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.loBUCQXRJPHNMIO_MgN40TJ7UIDwZdfi_5HxqdvTnhdRDtQ7-uZLNuERG7Pm6Cm_wgUxR2emGXnkRnoaG-QbvUNVDTP3LzTzdzfFsCuwD7PgGiUKVIeRBQNzVIN0OIlzDMfCHgkduKJDSGCGVrK8f3jpqeL7h7rUPd6ex-9NxcYriE8pvPcqRzxhm1TV3eZwP6eUK7oFQcVrT8tdGSCCg3bEChp5gCA0aWaQ3DUUcklC6A1UjhprRID3sFdqHJWjqJ5PiMBHp1T8B8qJKCDmlcMn030kLEdhVE0sgdAg9EIHLMxyUBkbx5KskspwmT4sKikgYbutrUSY6mn6-XuTzwF8Ffcq2gm0DJ63tni1wzlQlkywzJoTFkDIUT9wWqIeFhgSWRdHnD7CJcOxLzd5Yn9JQo43lSY1aM2R3c06TLJB5pauMk72gBvFe3NhGPS4GnYGikoJSexzkuXmDq_oTZWg5HKbgredoTaI3RxNamUBwR0RPRh1OjZmZa5ZwjrFzBvKMxOudVVMeqcViAI-SGCTjZu-uvqxJ6fnfAZyh_4xl0EbpJ3AyHZwGuOYy0YWwqxxm00cEknc2o3PxVlgFjmkZPmZC0GUAH1D8tXjT4O-bnogaikG5Pl21S-audpVrAz5h7N6R9RcXUDpYg2S_OD7s2WQYpOVDPw7xkIKW0w",
                "Postman-Token: 5710836a-fade-4431-b518-6e6d6fb9c70b",
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $file = 'live-request-report.pdf';
            file_put_contents($file, $response);
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                $fp = fopen($file, "r");
                while (!feof($fp))
                {
                    echo fread($fp, 65536);
                    flush(); // this is essential for large downloads
                }
                fclose($fp);

            }

        }

    }
}
