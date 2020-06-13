const fs = require('fs');
const readline = require('readline');

async function processLineByLine() {
  const fileStream = fs.createReadStream('test.txt');

  const rl = readline.createInterface({
    input: fileStream,
    crlfDelay: Infinity
  });

  var newLines = [];
  for await (const line of rl) {
    let newLine = 'client.println("' + line + '");';
    newLine = newLine.replace(/\s+/, "");
    newLines.push(newLine);
    // console.log(`Line from file: ${newLine}`);
  }
  return newLines;
}

let transformedLines = processLineByLine().then(newLines => newLines);
console.log(transformedLines);

// async function run()
// {
//     const data = await processLineByLine();
//     console.log(data);
// }
// run();