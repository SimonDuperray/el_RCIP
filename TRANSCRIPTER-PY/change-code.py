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

def createNewFile(newFileParam):
    finalTxtFile = open("finalTxtFile.txt", "w+")
    for line in range(len(newFileParam)):
        finalTxtFile.write(newFileParam[line]+'\n')

createNewFile(transformClient('test.txt'))