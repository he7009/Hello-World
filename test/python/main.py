# -*- coding: utf-8 -*-
import os
import shutil

from PIL import Image, ImageDraw, ImageFont


def save_img(font_name):
    ttf = u'/vagrant/Hello-World/test/python/source/' + font_name + '.ttf'
    print(ttf)
    im = Image.open('/vagrant/Hello-World/test/python/m/2.png')
    draw = ImageDraw.Draw(im)

    # 田字格
    myfont = ImageFont.truetype(ttf, size=40)
    fillcolor = '#323232'
    draw.text((12, 16), "字", font=myfont, fill=fillcolor)
    draw.text((75, 16), "魂", font=myfont, fill=fillcolor)
    draw.text((138, 16), "字", font=myfont, fill=fillcolor)
    draw.text((198, 16), "体", font=myfont, fill=fillcolor)

    im.save("/vagrant/Hello-World/test/python/target/"+font_name + ".png", 'PNG', quality=100)


def main2():
    path = "/vagrant/Hello-World/test/python/source/"
    files = os.listdir(path)
    for f in files:
        h = os.path.splitext(f)
        if (h[1] == '.ttf'):
            save_img(h[0])


main2()

