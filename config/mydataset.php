<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/19 0019
 * Time: 17:18
 */
return [
    'years'=>range(1949,2000),
    'month'=>range(01,12),
    'marry_status'=>[
        '未知','未婚','离异','丧偶'
    ],
    'educations'=>array('未知','大专以下','大专','本科','硕士','博士','博士后'),//会员学历=>
    'salarys'=>array(  //会员薪水
        '未知','2000以下','2000-4000','4000-6000','6000-8000','8000-12000','12000-15000','15000-30000','30000-50000','50000以上'
    ),
    'hign_types'=>array(
        '150以下','150-159','160-169','170-179','180-189','190-199','200以上'  //会员身高
    ),
    'industrys'=>array(
        '未知','IT行业','金融','服务','传媒','农林','公务','自由客' //会员行业
    ),
    'house_conds'=>array(
        '未知','和父母同住','已购房','单位宿舍','租房','打算婚后购房'  //会员住房条件
    ),
    'sex'=>[
        '未知','男','女'
    ],
    'has_childs'=>array(
        '未知','没有','有，自己赡养','有，前任赡养'
    ), //会员有无孩子
    'nations'=>array(
        '未知','汉族','蒙古族','回族','藏族','维吾尔族','苗族','彝族','壮族','布依族','朝鲜族','满族',
        '侗族','瑶族','白族','土家族','哈尼族','哈萨克族','傣族','黎族','傈僳族','佤族','畲族','高山族',
        '拉姑族','水族','东乡族','纳西族','景颇族','柯尔克孜族','土族','达斡尔族','么老族','羌族','布朗族','撒拉族',
        '毛南族','仡佬族','锡伯族','阿昌族','普米族','塔吉克族','怒族','乌兹别克族','俄罗斯族','鄂温克族','德昂族','保安族',
        '裕固族','京族','塔塔尔族','独龙族','鄂伦春族','赫哲族','门巴族','珞巴族','基诺族','外国人'
    ),
];