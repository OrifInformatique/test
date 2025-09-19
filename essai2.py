#rectangle 2D ascii qui se tourne
import os
import math
import time
block = "@"
nothing = " "
WIDTH = 50
HEIGHT = 50
buffer = [[nothing for x in range(WIDTH)]for y in range(HEIGHT)]
rectAngle = 0
def drawRect(x,XscaleHalf,y,Yscale,angle,buffer):
    Xscale = XscaleHalf*2
    rad = angle * math.pi/180
    centerX = x+Xscale/2
    centerY = y+Yscale/2
    
    for YI in range(y,y+Yscale):
        for XI in range(x,x+Xscale):
            diffX = XI - centerX
            diffY = YI - centerY
            rotX = diffX * math.cos(rad) + diffY * math.sin(rad)+centerX
            rotY = diffX * math.sin(rad) - diffY * math.cos(rad)+centerY
            adjustX = int(rotX + centerX)
            adjustY = int(rotY + centerY)
            buffer[adjustY][adjustX] = block
            
while(True):
    rectAngle += 5
    
    #clean
    os.system("cls")
    
    #add empty space
    for y in range(HEIGHT):
        for x in range(WIDTH):
            buffer[y][x] = nothing
        
    #draw spinning rectangle
    drawRect(5,10,5,10,rectAngle,buffer)
    
    #draw results
    for row in buffer:
        print("".join(row))
    time.sleep(0.05)
    