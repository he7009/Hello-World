# -*- coding: utf-8 -*-
import os
import shutil

from PIL import Image, ImageDraw, ImageFont


def save_img(font_name):
    ttf = u'/vagrant/Hello-World/test/python/source/' + font_name + '.ttf'
    print(ttf)
    im = Image.open('/vagrant/Hello-World/test/python/m/yj.jpg')
    draw = ImageDraw.Draw(im)
    myfont = ImageFont.truetype(ttf, size=36)
    # 字体类型
    fillcolor = '#666666'
    draw.text((100, 50), font_name, font=myfont, fill=fillcolor)

    # 田字格
    myfont = ImageFont.truetype(ttf, size=116)
    fillcolor = '#333333'
    draw.text((132, 150), "独", font=myfont, fill=fillcolor)
    draw.text((350, 150), "运", font=myfont, fill=fillcolor)
    draw.text((560, 150), "匠", font=myfont, fill=fillcolor)
    draw.text((770, 150), "心", font=myfont, fill=fillcolor)

    # 字体展示
    myfont = ImageFont.truetype(ttf, size=24)
    fillcolor = '#999999'
    draw.text((105, 345), "唯有文字能担当此任", font=myfont, fill=fillcolor)
    draw.text((105, 375), "宣告生命曾经在场", font=myfont, fill=fillcolor)
    draw.text((445, 345), "Life is flower for", font=myfont, fill=fillcolor)
    draw.text((445, 375), "which love is the honey", font=myfont, fill=fillcolor)
    draw.text((840, 345), "01234", font=myfont, fill=fillcolor)
    draw.text((840, 375), "56789", font=myfont, fill=fillcolor)

    # 海报
    myfont = ImageFont.truetype(ttf, size=187)
    fillcolor = '#333333'
    draw.text((420, 770), "独", font=myfont, fill=fillcolor)
    draw.text((420, 970), "运", font=myfont, fill=fillcolor)
    draw.text((420, 1180), "匠", font=myfont, fill=fillcolor)
    draw.text((420, 1370), "心", font=myfont, fill=fillcolor)

    # 广告
    myfont = ImageFont.truetype(ttf, size=92)
    fillcolor = 'white'
    draw.text((328, 2000), "独运匠心", font=myfont, fill=fillcolor)

    # 广告下小字
    myfont = ImageFont.truetype(ttf, size=18)
    fillcolor = 'white'
    draw.text((350, 2110), "唯有文字能担当此任，宣告生命曾经在场", font=myfont, fill=fillcolor)

    # 书
    myfont = ImageFont.truetype(ttf, size=58)
    fillcolor = '#666666'
    draw.text((265, 2480), "独", font=myfont, fill=fillcolor)
    draw.text((265, 2545), "运", font=myfont, fill=fillcolor)
    draw.text((265, 2730), "匠", font=myfont, fill=fillcolor)
    draw.text((265, 2790), "心", font=myfont, fill=fillcolor)
    
    # 米袋
    myfont = ImageFont.truetype(ttf, size=52)
    fillcolor = '#333333'
    draw.text((650, 2480), "独", font=myfont, fill=fillcolor)
    draw.text((650, 2535), "运", font=myfont, fill=fillcolor)
    draw.text((710, 2555), "匠", font=myfont, fill=fillcolor)
    draw.text((710, 2610), "心", font=myfont, fill=fillcolor)

    im.save("/vagrant/Hello-World/test/python/target/"+font_name + ".jpg", 'JPEG', quality=100)


def main():
    path = "D:/workspace/pywork/pik"
    files = os.listdir(path)
    for f in files:
        if (os.path.isdir(path + '/' + f)):
            if (f[0] == '.'):
                pass
        h = os.path.splitext(path + '/' + f)
        if (h[1] == '.jpg'):
            shutil.move(path + '/' + f, path + '/jpg/' + f)


def main2():
    path = "/vagrant/Hello-World/test/python/source/"
    files = os.listdir(path)
    for f in files:
        h = os.path.splitext(f)
        if (h[1] == '.ttf'):
            save_img(h[0])


main2()

