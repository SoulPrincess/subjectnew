<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 空模块，主要用于显示404页面，请不要删除
*/
    class EmptyController extends Controller{
        public function _empty(){
            $this->display( C('TMPL_EXCEPTION_FILE'));
        }
    }