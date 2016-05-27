@extends('base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-md-offset-3">
                <p><strong>Millega on tegu selle lehe näol?</strong></p>
                <p>Antud lehekülg on tehtud uurimaks, mis see PlanetOS on ja mida ta annab. Inimesena kellel polnud õrna aimugi, mis need keskkonna andmed on, oli avastamis rõõmu palju, nii palju infot on kättesaadav ning väga lihtne tõlgendada ning see on ka selle lehe eesmärk, jääda väga lihtsaks ning anda aimu, missugused võimalused on antud hetkel maailmas erinevate andmete nägemiseks ning lugemiseks.</p>
                <p>Antud lehel on näiteks toodud 2 APIt päringuid saab teha <a href="{{URL::action('Controller@getData')}}">siin</a></p>
                <p>Lehe source code on avalik
                    <a href="https://github.com/humunuk/whatsPlanetOS">GitHubis</a></p>
            </div>
            <div class="col-md-7 col-md-offset-3">
                <h4 class="page-header">Mis on PlanetOS?</h4>
                <p>
                    PlanetOS on Eestist alguse saanud idufirma, mis koondab endast erinevaid keskkonna- ja sensorandmeid ning teeb need mugavalt kättesaadavaks kõigile. Kuna enamus andmeid paiknevad erinevates serverites ning on laiali pillutatud, siis on nende andmetega midagi väga raske peale hakata. PlanetOS koondab andmed mugavalt kokku ning annab vahendid ja ligipääsu.
                </p>
                <p>
                    Neil on praeguseks hetkeks avalikuks kasutamiseks <a href="http://data.planetos.com/datasets">14 erinevat andmekogumikku</a> (<i>datasett-i</i>). Millel saab ligi iga inimene ning andmete päringu tegemiseks ei ole vaja isegi osata programmerimist, andmed kuvatakse mugavalt JSON struktuuris ning nende töötlemine erinevate vahenditega ei ole keeruline. Peale registreerimist saad endale API key, millega on võimalik andmetele ligi saada ning päringuid võib teostada 500 päevas või kuni oled kasutanud 5GB andmemahtu.
                </p>
                <p><strong>PlanetOS ise endast:</strong></p>
                <p><iframe width="560" height="315" src="https://www.youtube.com/embed/fdNYz5OQfXk" frameborder="0" allowfullscreen></iframe></p>
                <p><strong>Lisainfo:</strong></p>
                <p><a href="http://docs.planetos.com/">API dokumentatsioon</a></p>
            </div>
        </div>
    </div>
@stop