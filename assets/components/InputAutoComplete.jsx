import React, { useState } from "react";
import ReactAutocomplete from "react-autocomplete";
import axios from "axios";

export function InputAutoComplete(props) {

    let params = {
        appid: 'r3ncFiASLzTYvTVW4gpM',
        apikey: 'MPjPBkGSsV_-P78ADjkDAxVDwdpsU9pFqUoZMRc36p8',
        limit: 20,
        in: `countryCode:FRA`, // code de pays en ISO-3 (ou alpha-3), si vous voulez la liste complète : https://www.iban.com/country-codes
        language: 'fr_FR'
    };

    const [state, setState] = useState({
        value: ''
    });
    const [items, setItems] = useState([]); //initialement ma liste de résultat est vide!

    const handleChange = (e) => {
        let q = e.target.value;
        console.log('%c⧭', 'color: #aa00ff', q);
        setState({ value: q });
        if (q) {
            params.q = q; // le modifie les paramètres initiaux pour lui dire que la query sera celle ci. q est la clé attendu par HERE dont il faut s'y tenir...

            axios.get(
                "https://geocode.search.hereapi.com/v1/geocode",
                { params }
            ).then((response) => {
                console.log(response.data.items);
                setItems(response.data.items); // je modifie l'état items pour y stocker mes résultats
            })
        }
    }

    const handleSelect = (value) => {// la value est ici l'id de l'item cliqué
        let itemSelection = items.find((elmt) => elmt.id === value);
        console.log(JSON.stringify(itemSelection));
    }

    return (
        <ReactAutocomplete
            renderInput={(props) => { return <input {...props} style={{ width: '30rem' }} /> }} // je vous mets l'exemple si vous souhaitez personnaliser votre input....
            items={items} //tableau comprenant les recherches
            shouldItemRender={(item, value) => item.title.toLowerCase().indexOf(value.toLowerCase()) > -1} // recherche à partir des terme en minuscules
            getItemValue={item => item.id}
            renderItem={(item, highlighted) => //regardez bien, je récupère le item.position que j'ai stocké à la suite de ma requête plus haut
                <div
                    key={item.id}
                    style={{ backgroundColor: highlighted ? '#eee' : 'transparent' }}
                >
                    {`${item.title} (latitude: ${item.position.lat}, longitude: ${item.position.lng})`}
                </div>
            }
            value={state.value}
            onChange={handleChange}
            onSelect={handleSelect}
        />
    )

}