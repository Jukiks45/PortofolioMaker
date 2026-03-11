te_path>
d:/1.Programing/pemograman web/KBT/PortofolioMaker/fix_quotes.js
</absolute_path>
<parameter name="content">
const fs = require('fs');
const path = 'resources/views/index.blade.php';

let content = fs.readFileSync(path, 'utf8');
content = content.replace(/\\'/g, "'");
fs.writeFileSync(path, content);
console.log('Fixed!');
