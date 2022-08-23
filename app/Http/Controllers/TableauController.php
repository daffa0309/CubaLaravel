<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableau_url = env("TABLEAU_SERVER_URL");

        $ch = curl_init();

        $body = [
            "username" => env("TABLEAU_SERVER_USER"),
            "submittable" => "Get Ticket"
        ];
        if (env("TABLEAU_SITE") != null) {
            $body["target_site"] = env("TABLEAU_SITE");
        }

        curl_setopt($ch, CURLOPT_URL, "{$tableau_url}/trusted");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (env("TABLEAU_SERVER_CA") != null) {
            curl_setopt($ch, CURLOPT_CAINFO, env("TABLEAU_SERVER_CA"));
        }

        $ticket = curl_exec($ch);

        curl_close($ch);
        $url = "{$tableau_url}/trusted/{$ticket}";
        if (env("TABLEAU_SITE") != null) {
            $url = $url . "/t/" . env("TABLEAU_SITE");
        }
        $url = $url . "/views/" . env("TABLEAU_VIEW") . "?:toolbar=n";
        var_dump($url);

        return view("dashboard.index", [
            "ticket" => $ticket,
            "url" => $url
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
