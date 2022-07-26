import React, {useState, useEffect} from 'react';
import Base from "./Base";
import axios from 'axios'

const Main = () => {

    const [allCommunities, setAllCommunities] = useState([]);
    const [communities, setCommunities] = useState([]);
    const [communityValue, setCommunityValue] = useState('');
    const [communitySelected, setCommunitySelected] = useState([]);
    const [municipality, setMunicipality] = useState([]);
    const [municipalitySelected, setMunicipalitySelected] = useState('');
    const [weatherOfMunicipality, setWeatherOfMunicipality] = useState(null);
    const [loading, setLoading] = useState(false);
    const [town, setTown] = useState('');

    useEffect(() => {
        getCommunities();
    }, [])

    const getAutonomy = (event) => {
        setCommunityValue(event.target.value);
        setCommunitySelected(Object.keys(allCommunities[event.target.value]));
    }

    const getProvince = (event) => {
        setMunicipalitySelected(event.target.value);
        const municipalityData = [];
        allCommunities[communityValue][event.target.value].map(response => {
            response.data.map(m => {
                municipalityData.push({
                    id: m.id,
                    name: m.name,
                })
            });
        });

        orderByName(municipalityData);
        setMunicipality(municipalityData);
    }

    const getCommunities = () => {
        axios.get('http://127.0.0.1:8000/municipalities')
            .then((res) => {
                setAllCommunities(res.data.data);
                setCommunities(Object.keys(res.data.data));
            })
            .catch((err) => console.log(err));
    }

    const getMunicipality = (event) => {

        setLoading(true);
        setTown(event.target.value);
        setWeatherOfMunicipality(null);

        axios.get('http://127.0.0.1:8000/municipality/' + event.target.value)
            .then(res => {
                setWeatherOfMunicipality(JSON.stringify(res.data.data, undefined, 2));
                setLoading(false);
            });
    }

    return communities.length === 0 ?
        <div className={'text-center justify-content-center mt-5'}>
            <div className="spinner-border text-primary" role="status">
                <span className="visually-hidden">Loading...</span>
            </div>
        </div>
        :
        (
            <Base>
                <div className="row">
                    <div className={"col-md-6"}>
                        <h4>Select options for getting weather information</h4>
                        <div className={'mt-4'}>
                            <h6>Community</h6>
                            <select name="" id="" className={'form-select'} value={communityValue} onChange={getAutonomy}>
                                <option value={''}>Get a community</option>
                                {communities.map(i =>
                                    <option value={i} key={i}>{i}</option>
                                )}
                            </select>

                            <div className={'mt-4'}>
                                {
                                    communitySelected.length !== 0 &&
                                    <div>
                                        <h6>Province</h6>
                                        <select name="" id="" className={'form-select'} value={municipalitySelected} onChange={getProvince}>
                                            <option value={''}>Get a Province</option>
                                            {communitySelected.map(s =>
                                                <option value={s} key={s}>{s}</option>
                                            )}
                                        </select>
                                    </div>
                                }
                            </div>

                            <div className={'mt-4'}>
                                {
                                    municipality.length !== 0 &&
                                    <div>
                                        <h6>Municipality</h6>
                                        <select name="" id="" className={'form-select'} value={town} onChange={getMunicipality}>
                                            <option value={''}>Get a municipality</option>
                                            {municipality.map(m =>
                                                <option value={m.id} key={m.id}>{m.name}</option>
                                            )}
                                        </select>
                                    </div>
                                }
                            </div>


                        </div>

                    </div>
                    <div className="col-md-6">
                        {loading &&
                        <div className={'text-center justify-content-center mt-5'}>
                            <div className="spinner-border text-primary" role="status">
                                <span className="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        }
                        {weatherOfMunicipality &&
                        <div>
                            <h4>Weather data: </h4>
                            <div className={'card mt-3'}>
                                <div className="card-body">
                                    <div style={
                                        {
                                            height: 800,
                                            overflowY: 'scroll'
                                        }
                                    }>
                                        <pre>{weatherOfMunicipality}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        }
                    </div>
                </div>
            </Base>
        );
}

const orderByName = (items) => {
    items.sort(function (a, b) {
        if (a.name > b.name) {
            return 1;
        }
        if (a.name < b.name) {
            return -1;
        }
        // a must be equal to b
        return 0;
    });
    return items;
}

export default Main;
