def deTransformClient(file):
    detransformedLines = []
    with open(file) as fp:
        line = fp.readline()
        while line:
            line = line.replace('client.println("', '')
            line = line.replace('");', '')
            line = line.replace('\n', '')
            detransformedLines.append(line)
            line = fp.readline()
    return detransformedLines

def createNewFile(transformed, finalFile):
    finalTxtFile = open(finalFile, "w+")
    for line in range(len(transformed)):
        finalTxtFile.write(transformed[line]+'\n')

createNewFile(deTransformClient('finalTxtFile.ino'), 'final.txt')