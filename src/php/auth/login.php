<?php
/**
 * @file   login.php
 * @brief  util function for login authentication
 * @author simpart
 */
namespace auth;
require_once(__DIR__ . '/../com/define.php');
require_once(__DIR__ . '/func.php');
require_once(__DIR__ . '/define.php');
 
try {
    $post = json_decode(file_get_contents('php://input'));
    /* login authentication */
    if (false === authLogin($post->username, $post->password)) {
        return false;
    }
    
    /* set session */
    $ses   = new \ttr\session\Controller(DCOM_APP_TITLE);
    $ses->set(DATH_LGNCHK, true);
    
    return true;
} catch (\Exception $e) {
echo $e->getMessage();
    throw new \Exception(
               PHP_EOL .
               'File:' . __FILE__     . ',' .
               'Line:' . __line__     . ',' .
               'Func:' . __FUNCTION__ . ',' .
               $e->getMessage()
          );
}
/* end of file */
