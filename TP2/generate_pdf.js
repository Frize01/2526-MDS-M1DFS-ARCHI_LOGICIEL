const fs = require('fs');
const path = require('path');
const md = require('markdown-it')({ html: true });

(async function(){
  try{
    const files = ['monolithique','microservice','even-driven'];
    let out = '# TP2 - Architectures\n\n';
    for(const f of files){
      const mdPath = path.join('TP2', f + '.md');
      let txt = fs.readFileSync(mdPath, 'utf8');
      txt = txt.replace(/```mermaid[\s\S]*?```/g, `![](${path.posix.join('assets', f + '.svg')})`);
      out += '---\n\n' + txt + '\n\n';
    }
    const html = '<!doctype html><meta charset="utf-8">' + md.render(out);
    const htmlPath = path.resolve('TP2', '_combined.html');
    fs.writeFileSync(htmlPath, html, 'utf8');

    const puppeteer = require('puppeteer');
    const browser = await puppeteer.launch({ args: ['--no-sandbox', '--disable-setuid-sandbox'] });
    const page = await browser.newPage();
    await page.goto('file://' + htmlPath);
    await page.pdf({ path: path.resolve('TP2','TP2_architectures.pdf'), format: 'A4' });
    await browser.close();
    console.log('PDF créé: TP2/TP2_architectures.pdf');
  } catch(e){
    console.error(e);
    process.exit(1);
  }
})();
