<?php /* Smarty version Smarty-3.1.6, created on 2023-08-19 22:45:47
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11161649fde94120643-64747655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1692477942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11161649fde94120643-64747655',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_649fde9416118',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_649fde9416118')) {function content_649fde9416118($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css"/>
        <script src="/js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="/js/main.js" type="text/javascript" ></script>
    </head>
        <body>
            <div id="header">
                <h1>my shop - интернет магазин</h1>
            </div>
            
            <?php echo $_smarty_tpl->getSubTemplate ("leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            
            
               
           
<?php }} ?>