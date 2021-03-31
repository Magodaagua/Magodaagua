'''
Lucas Siqueira (lucas.morais.siqueira@gmail.com)
'''

import os

import PIL.Image

file_list = [
'preview0025.png',
'preview0033.png',
'preview0041.png',
'preview0049.png',
'preview0057.png',
'preview0065.png',
'preview0073.png',
'preview0081.png',
'preview0089.png',
'preview0097.png',
'preview0105.png',
'preview0113.png'
]

dir_names = next(os.walk('.'))[1]

def create_strips():
    '''
    To create the strips (series of frames, in a single file) for each roll.
    '''
    dir_list = {}
    for dir in dir_names:
        dir_list[dir] = []
        for file in file_list:
            #print(dir, '-', file)
            fname = str(dir) + '//' + str(file)
            dir_list[dir].append(PIL.Image.open(fname))
        size = (int(dir_list[dir][0].size[0] * 12), dir_list[dir][1].size[1])
        new_img = PIL.Image.new('RGBA', size)
        for i in range(12):
            new_img.paste(dir_list[dir][i], (i*(dir_list[dir][0].size[0]), 0))
        new_img.save(str(dir)+'.png')

def create_grid():
    '''
    Create a big image for every frame, so that you can, for example, make an animated GIF ouf of it, representing every roll.
    Problem for me was that while creating the GIF the quality got even worse (color pallete restrictions of the GIF, etc.)
    But the function works, tho.
    '''
    dir_list = {}
    for dir in dir_names:
        dir_list[dir] = []
        for file in file_list:
            fname = str(dir) + '//' + str(file)
            dir_list[dir].append(PIL.Image.open(fname))
    size = (int(dir_list[dir][0].size[0] * 4), int(dir_list[dir][0].size[1] * 5))

    temp = []
    new_img = {}
    for file in file_list:
        new_img[file] = PIL.Image.new('RGBA', size)
        row = 0
        col = 0
        for i in range(20):
            fname = dir_names[i] + '//' + str(file)
            copy_img = PIL.Image.open(fname)
            #print('copying:', fname)
            #print('pasting on:', (col * dir_list[dir][0].size[0], row * dir_list[dir][0].size[1]))
            new_img[file].paste(copy_img, (col * dir_list[dir][0].size[0], row * dir_list[dir][0].size[1]))
            if col == 3:
                row += 1
            col += 1
            col = col & 3
        print('saving:', file)
        new_img[file].save(str(file))
                    
def tile_down(list, new):
    '''
    From a list of files of the same size, paste them below each other.
    
    (used to create 'd20-all.png', the preview available on the openart page)
    The example below is ready to used just paste it on the end of this file to run.
    list = [
    'r01.png'
    'r02.png'
    'r03.png'
    'r04.png'
    'r05.png'
    'r06.png'
    'r07.png'
    'r08.png'
    'r09.png'
    'r10.png'
    'r11.png'
    'r12.png'
    'r13.png'
    'r14.png'
    'r15.png'
    'r16.png'
    'r17.png'
    'r18.png'
    'r19.png'
    'r20.png'
    ]
    tile_down(list, 'd20-all.png')
    '''
    size = [0, 0]
    open_list = []
    
    for i in range(len(list)):
        open_list.append(PIL.Image.open(list[i]))
        
    for img in open_list:
        size[0] = img.size[0]
        size[1] += img.size[1]
    
    new_img = PIL.Image.new("RGBA", size)
    
    for i in range(len(open_list)):
        new_img.paste(open_list[i], (0, i*open_list[i].size[1]))
    
    new_img.save(new)

if __name__ == '__main__':
