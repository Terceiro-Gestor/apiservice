import fs from 'fs/promises';
import translate from '@vitalets/google-translate-api';

async function translateName(name) {
    try {
        const res = await translate(name, {to: 'ru'});
        return res.text;
    } catch (e) {
        return name;
    }
}

async function main() {
    const data = JSON.parse(await fs.readFile('states.json', 'utf8'));
    for (const country of data.data) {
        country.name_pt = await translateName(country.name);
        console.log(country.name_pt);
        if (country.states) {
            for (const state of country.states) {
                if (state.name) {
                    state.name_pt = await translateName(state.name);
                }
            }
        }
    }
    await fs.writeFile('states_ptbr.json', JSON.stringify(data, null, 2));
}

main();