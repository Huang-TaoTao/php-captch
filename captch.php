<?php
header('content-type:image/png');
$image = imagecreatetruecolor(100, 30);
//设置背景图大小，默认返回的是黑色的照片
$bgcolor = imagecolorallocate($image, 255, 255, 255);
//将背景设置为白色的
imagefill($image, 0, 0, $bgcolor);
//将白色铺满
$captch_code='';
//空字符串，每循环一次，追加到字符串后面

for ($i=0; $i < 4; $i++) {
    $fontsize=6;
    $fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
    $fontcontent = rand(0,9);
    //产生随机数字0-9
    $captch_code.= $fontcontent;
    $x=($i*100/4)+rand(5,10);
    $y=rand(5,10);
    //数字的位置
    imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
    //设置字体，大小，坐标，内容，颜色
}

for ($i=0; $i < 200; $i++) {
    $pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
    imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
    //画一个像素，x，y，颜色
}

for ($i=0; $i < 3; $i++) {
    $linecolor = imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
    imageline($image, rand(1,99), rand(1,29),rand(1,99), rand(1,29) ,$linecolor);
    //画一条线，起点xy，终点xy，颜色
}
imagepng($image);
//输出图片
imagedestroy($image);
//销毁
?>