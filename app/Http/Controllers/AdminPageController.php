<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard ()
    {
        $data = [
            [
                "name" => "Vivian Lester",
                "phone" => "(433) 486-8215",
                "email" => "est@yahoo.ca",
                "address" => "P.O. Box 437, 2098 Ultrices Ave"
            ],
            [
                "name" => "Sandra Robbins",
                "phone" => "(577) 567-8613",
                "email" => "tellus.non@google.ca",
                "address" => "P.O. Box 177, 4353 Molestie Rd."
            ],
            [
                "name" => "Athena Byers",
                "phone" => "(966) 715-4947",
                "email" => "nunc.risus@yahoo.edu",
                "address" => "895-4771 Proin Av."
            ],
            [
                "name" => "Blythe Harrison",
                "phone" => "(625) 378-2201",
                "email" => "vestibulum.ante@icloud.net",
                "address" => "5993 Aliquam St."
            ],
            [
                "name" => "Rachel Benson",
                "phone" => "1-537-695-4667",
                "email" => "gravida@protonmail.couk",
                "address" => "P.O. Box 946, 7527 Vitae Av."
            ]
        ];
        return view('admin.pages.dashboard', compact('data'));
    }
    public function chart ()
    {
        return view('admin.pages.chart');
    }
    public function table ()
    {

        return view('admin.pages.table');
    }
}
