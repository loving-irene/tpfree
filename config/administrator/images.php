<?php

use App\Models\Image;

return [
    // 页面标题
    'title'   => '图片',

    // 模型单数，用作页面『新建 $single』
    'single'  => '图片',

    // 数据模型，用作数据的 CRUD
    'model'   => Image::class,

    // 设置当前页面的访问权限，通过返回布尔值来控制权限。
    // 返回 True 即通过权限验证，False 则无权访问并从 Menu 中隐藏
    'permission'=> function()
    {
        return Auth::user()->can('manage_images');
    },

    // 字段负责渲染『数据表格』，由无数的『列』组成，
    'columns' => [

        // 列的标示，这是一个最小化『列』信息配置的例子，读取的是模型里对应
        // 的属性的值，如 $model->id
        'id',

        'relative_path' => [
            // 数据表格里列的名称，默认会使用『列标识』
            'title'  => '图片',
            'output'=>function($relative_path,$model){
                return '<img src="'.$relative_path.'" style="width: 50px">';
            },
            'sortable' => false,
        ],

        'title' => [
            'title'    => '标题',
            'sortable' => false
        ],

        'tag' => [
            'title' => '标签',
        ],

        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    // 『模型表单』设置项
    'edit_fields' => [
        'title' => [
            'title' => '标题',
        ],
        'tag' => [
            'title' => '标签',
        ],
        'relative_path' => [
            'title' => '图片',

            // 设置表单条目的类型，默认的 type 是 input
            'type' => 'image',

            // 图片上传必须设置图片存放路径
            'location' => public_path() . '/upload/images/'.date('Ym/d',time()).'/',
        ],
    ],

    // 『数据过滤』设置
    'filters' => [
        'id' => [

            // 过滤表单条目显示名称
            'title' => 'ID',
        ],
        'title' => [
            'title' => '标题',
        ],
        'tag' => [
            'title' => '标签',
        ],
    ],
];
