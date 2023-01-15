<?php

function setSession($responseBody,$token)
{
    session()->put('access_token', $token);
    session()->put('user_id',$responseBody['current_user']['id']);
    session()->put('name',$responseBody['current_user']['name']);
    session()->put('email',$responseBody['current_user']['email']);
    session()->put('bank_name',$responseBody['account'][0]['bank_name']);
    session()->put('account_number',$responseBody['account'][0]['account_number']);
    session()->put('account_id',$responseBody['account'][0]['account_id']);
    session()->put('balance',$responseBody['account'][0]['balance']);
    return true;
}
function resetSession($responseBody)
{
    session()->put('bank_name',$responseBody['account'][0]['bank_name']);
    session()->put('account_number',$responseBody['account'][0]['account_number']);
    session()->put('account_id',$responseBody['account'][0]['account_id']);
    session()->put('balance',$responseBody['account'][0]['balance']);
    return true;
}
