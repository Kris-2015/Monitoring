<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Handles request to sent information to JIRA
 * @access public
 * @package App\Http\Controllers
 * @subpackage void
 * @category void
 * @author mfsi-krishnadev
 * @link void
 */
class JiraController extends Controller
{
    /**
     * Function to get request token from JIRA
     *
     * @param: 
     * @return:
     */
    public function configureClient(Request $request)
    {

        $request_token = env('REQUEST_TOKEN');  //$request->all()['request_token'];
        $authorization = env('AUTHORIZATION');   //$request->all()['authorization'];
        $access_token  = env('ACCESS_TOKEN');   //$request->all()['access_token'];
        $oauth_signing_type = env('OAUTH_SIGN_TYPE');  //$request->all()['oauth_signing_type'];
        $consumer_key = env('CONSUMER_KEY');  //$request->all()['consumer_key'];

        // Initialise the curl operation
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'seeless.atlassian.net');
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
            'request_token' => $request_token,
            'authorization' => $authorization,
            'access_token' => $access_token,
            'oauth_signing_type' => $oauth_signing_type,
            'consumer_key' => $consumer_key
        )));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_response = curl_exec ($ch);

        dd($server_response);
    }

    /**
     * Function to get the result from callback
     *
     * @param: Request
     * @return: void
     */
    public function authorizeData( Request $request)
    {
        dd('hi computer');
        dd($request->all());
    }
}
