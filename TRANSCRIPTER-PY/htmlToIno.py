def transformClient(file):
    transformedLines = []
    with open(file) as fp:
        line = fp.readline()
        while line:
            line = line.strip()
            line = 'client.println("' + line + '");'
            line = line.replace('\n', '')
            line+='\n'
            transformedLines.append(line)
            line = fp.readline()
    return transformedLines

def createNewFile(transformed, finalFile):
    finalTxtFile = open(finalFile, "w+")
    for line in range(len(transformed)):
        finalTxtFile.write(transformed[line]+'\n')

createNewFile(transformClient('index.html'), 'index.ino')
