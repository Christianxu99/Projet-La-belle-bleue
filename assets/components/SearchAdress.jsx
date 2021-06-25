import "react-loader-spinner/dist/loader/css/react-spinner-loader.css";

import React, { useRef, useState } from "react";

import Highlighter from "react-highlight-words"; //composant pour mettre en avant les lettres matchant avec la recherche
import { IoCloseCircleSharp, IoGitMergeSharp } from "react-icons/io5"; // un icone venant de react-icons

import Loader from "react-loader-spinner"; // le loader d'attente
import axios from "axios"; //pour la requête

export function SearchAddress() {


    const timerRef = useRef(null); // je stockerai plus tard le setTimeout qui determinera si on a arrêter de taper dans le champs
    const [results, setResults] = useState([]); //le tableau, initialement vide, dans lequel je vais stocker les résultats de ma requête
    const [query, setQuery] = useState(""); // la variable contenant mon text de recherche 
    const [searching, setSearching] = useState(false); // l'état définissant si la recherche est cours (initialement false)
    const [showList, setShowList] = useState(false); // l'état définissant si la div affichant les résultats est visible ou non (initialement false)

    let params = {
        appid: 'r3ncFiASLzTYvTVW4gpM',
        apikey: 'MPjPBkGSsV_-P78ADjkDAxVDwdpsU9pFqUoZMRc36p8',
        limit: 20,
        in: `countryCode:FRA`, // code de pays en ISO-3 (ou alpha-3), si vous voulez la liste complète : https://www.iban.com/country-codes
        language: 'fr_FR'
    };

    const handleRequest2 = async () => {
        if (query) {
            params.q = query;
            const response = await axios.get(
                `https://geocode.search.hereapi.com/v1/geocode`, {
                params
            }
            );

            console.log('%c⧭', 'color: #00bf00', response.data.items);
            setResults(response.data.items);
            setSearching(false);
        }
    };

    const handleClick = () => {
        !showList && query.length > 0 && setShowList(true);
    };
    const handleChange = (e) => {
        let value = e.target.value;
        setSearching(true);
        setShowList(true);
        timerRef.current && clearTimeout(timerRef.current);
        if (query !== value) { // cette vérification évitera de refaire une requête lorsque l'on cliquera sur l'option grace au handleSelect en dessous
            setQuery(value);
            timerRef.current = setTimeout(() => {
                handleRequest2();
            }, 1000);
        }
    };
    const handleKeyDown = (e) => {
        console.log(e);
        e.keyCode === 27 &&
            (query.length > 0 && !showList ? setQuery("") : setShowList(false));
        timerRef.current && clearTimeout(timerRef.current);
    };
    const clearSearch = () => {
        setSearching(false);
        setShowList(false);
        setQuery("");
    };
    const handleSelect = (id) => {
        console.log(`Vous avez cliqué sur : ${id}`);
        let itemSelection = results.find((elmt) => elmt.id === id);
        setQuery(itemSelection.title)
        setShowList(false);

    };
    return (
        <>

            <div className="searchContainer">
                {query && ( // si query n'est pas vide ==> 
                    <IoCloseCircleSharp onClick={clearSearch} className="searchIcon" />
                )}

                <input
                    className="searchBox"
                    type="text"
                    value={query} // l'input doit être contrôlé pour pouvoir le vider quand j'en ai envie 
                    placeholder="ADRESSE ICI"
                    style={{ width: "100%" }}
                    name="search_authors"
                    onChange={handleChange}
                    onKeyDown={handleKeyDown}
                    onClick={handleClick}
                />
            </div>
            {showList && (
                <div
                    style={{
                        width: "100%",
                        position: "absolute",
                        width: "inherit",
                    }}
                >
                    <ul
                        style={{
                            height: "12rem",
                            listStyleType: "none",
                            backgroundColor: "white",
                            color: "darkgray",
                            display: "flex",
                            padding: "1rem",
                            flexDirection: "column",
                            textAlign: !searching ? "left" : "center",
                        }}
                    >
                        {results.length > 0 && !searching ? (
                            results.map((res, index) => {
                                return (
                                    <li
                                        key={index}
                                        className="resultLine"
                                        onClick={() => handleSelect(res.id)}
                                    >
                                        <Highlighter
                                            highlightClassName="highlistClass"
                                            searchWords={query.split(" ")} // on attend un tableau de mot donc on utilise split pour couper notre chaine de caractère à chaque espace
                                            autoEscape={true}
                                            textToHighlight={`${res.title} (latitude: ${res.position.lat}, longitude: ${res.position.lng})`} // je demande à vérifier dans res.nom si un des mots ou des mots venant de query correspond(ent)
                                        />
                                    </li>
                                );
                            })
                        ) : !searching && query ? (
                            <li>Aucun résultat</li>
                        ) : (
                            <li>
                                <Loader
                                    type="ThreeDots"
                                    color="#8BCAD4"
                                    height={40}
                                    width={40}
                                />
                            </li>
                        )}
                    </ul>
                </div>
            )}
        </>
    );
}