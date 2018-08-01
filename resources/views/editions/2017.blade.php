@extends('layouts.public')

@section('content')
<div class="alert alert-primary mb-4"><i class="far fa-archive" aria-hidden="true"></i> Aquesta votació ja ha finalitzat i està arxivada. Ves a l'<a href="/"><strong>edició actual</strong></a> per a consultar la votació en curs.</div>

<div class="results-page results results-2017">
    <h2><i class="far fa-chart-bar" aria-hidden="true"></i> @lang('participa.results') 2017</h2>

    <h4 class="results__section results__section--top">{{ trans_choice('participa.top_results', 3, ['num' => 3]) }}</h4>

    <div class="row">
        <div class="d-flex justify-content-center col-lg-4">
            <div class="results__card">
                <div class="d-flex">
                    <div class="results__media"><img src="/images/2017/1.jpg" alt="1" /></div>
                    <h5>Obertura d'un vial per als vianants entre C/Filharmònica i C/Empedrat</h5>
                </div>
                <p>Servirà per a facilitar la connexió per als vianants entre el centre i el casc antic i la primera línia.</p>
                <div class="results__votes">
                    <div class="results__points">15%</div>
                    <div class="progress">
                        <div class="d-flex" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center col-lg-4">
            <div class="results__card">
                <div class="d-flex">
                    <div class="results__media"><img src="/images/2017/2.jpg" alt="2" /></div>
                    <h5>Posada a punt de la Casa de l’Aigua per a poder ser utilitzada en condicions</h5>
                </div>
                <p>Est és un edifici municipal de moment en desús per la seua falta de condicionament. Una vegada recuperat, s'obri un ventall de possibilitats per al seu ús.</p>
                <div class="results__votes">
                    <div class="results__points">14%</div>
                    <div class="progress">
                        <div class="d-flex" style="width: 14%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center col-lg-4">
            <div class="results__card">
                <div class="d-flex">
                    <div class="results__media"><img src="/images/2017/3.jpg" alt="3" /></div>
                    <h5>Condicionament del solar contigu al conservatori</h5>
                </div>
                <p>(antigues cases dels mestres), convertint-ho en pàrquing, aportant als veïns i veïnes de la c/Mar c/Sant Pere i limítrofes, un espai on poder aparcar. Es delimitaria una zona per a acte caravanes, instal·lant un punt net i sostenible per a una correcta gestió de residus.</p>
                <div class="results__votes">
                    <div class="results__points">13%</div>
                    <div class="progress">
                        <div class="d-flex" style="width: 13%" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="results__section results__section--other">@lang('participa.other_results')</h4>

    <table class="table results__section--other">
        <colgroup>
            <col width="40" />
            <col />
            <col width="150" />
            <col width="60" />
        </colgroup>

        <tbody>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/4.jpg" alt="4" />
                </td>
                <td>
                    <h6>Millora de parcs infantils d'Altea i Altea la Vella</h6>
                    <p>Es durà a terme diverses actuacions depenent de la necessitat de cadascun dels parcs: canvi o reparació de les instal·lacions, plantació d'arbrat, millora de la seguretat, etc.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">12%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/5.jpg" alt="5" />
                </td>
                <td>
                    <h6>Creació d'un parc infantil en la zona verda de C/ La Trompa</h6>
                    <p>Malgrat ser una zona de relativa recent construcció i amb una gran densitat poblacional, no existeix cap parc infantil a una distància desitjable per a facilitar el seu ús. A més, i tenint en compte que no comptem amb cap d'aqueixes característiques a Altea, es concebria com un espai totalment accessible, amb jocs per a xiquets i xiquetes de diferents capacitats.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">10%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/6.jpg" alt="6" />
                </td>
                <td>
                    <h6>Optimització i reordenació de la xarxa semafórica del municipi</h6>
                    <p>Consisteix en instal·lar semàfors para persones invidents, i instal·lar sensors per a detectar la presència de vehicles en tots els creus, perquè el tràfic de les vies troncals, CN-322 i CV-755 es talle solament quan hi haja vianants que sol·liciten creuar-les o vehicles disposats a incorporar-se a elles, i harmonitzar el funcionament de tots a través de la interconnexió i gestió automatitzada. La reordenació tractaria de resituar semàfors per a donar servei a la ciutadania concorde al creixement urbà que ha digerit el municipi en les ultimes dècades.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">8%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/7.jpg" alt="7" />
                </td>
                <td>
                    <h6>Il·luminació corredor verd</h6>
                    <p>A dia d'avui, existeixen zones al llarg del Corredor Verd on no existeix il·luminació. Si tenim en compte que aquest és un dels espais més concorreguts per a l'oci en el nostre municipi, es fa necessari il·luminar aqueixes zones per a adequar-ho íntegrament en condicions de seguretat per als vianants.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 7%" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">7%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/8.jpg" alt="8" />
                </td>
                <td>
                    <h6>Millores en l'antic Escorxador</h6>
                    <p>Est és un edifici municipal que s'utilitza entre altres coses com a alberg per a allotjar al voluntariat mediambiental, que realitza una labor molt necessària en el nostre poble. Per a poder continuar tenint aqueix paper i fins i tot ampliar-ho, és necessari escometre certes millores en l'edifici i la zona exterior que permeten consolidar aqueix o uns altres possibles usos.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 6%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">6%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/9.jpg" alt="9" />
                </td>
                <td>
                    <h6>Dotar de videovigilancia els punts negres de recollida de residus</h6>
                    <p>Tots som conscients de la problemàtica i els costos que suposen la depositación incorrecta de residus en els punts negres. Dotant aquestes zones de videovigilancia s'obri la possibilitat d'emprendre accions sancionadores i, per tant, s'obtindrà un efecte dissuasori.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">5%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/10.jpg" alt="10" />
                </td>
                <td>
                    <h6>Millora en l'accés del cementeri d'Altea la Vella</h6>
                    <p>Els accessos al Cementeri Parroquial disten molt de ser els adequats per a una dotació d'aquest tipus. És necessari realitzar les actuacions necessàries per a millorar, fer més transitable i embellir aqueix espai.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 4%" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">4%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/11.jpg" alt="11" />
                </td>
                <td>
                    <h6>Canvi d'ubicació del parc per a gossos - pipican</h6>
                    <p>Es proposa canviar el parc per a gossos a la zona del pàrquing del Pontet, allunyant-ho del nucli d'habitatges per a evitar molèsties alhora que els usuaris puguen tenir més espai i més adequat a les necessitats dels gossos.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 3%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">3%</td>
            </tr>
            <tr>
                <td class="text-right align-middle">
                    <img src="/images/2017/12.jpg" alt="12" />
                </td>
                <td>
                    <h6>Adequació del jardí públic davant del CEAM</h6>
                    <p>Després de la reubicació del parc per a gossos, dotant-ho d'aparells de gimnàstica a l'aire lliure.</p>
                </td>
                <td class="align-middle">
                    <div class="progress">
                        <div class="d-flex" style="width: 3%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" role="progressbar">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                </td>
                <td class="text-right align-middle">3%</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="results-2017__press-release">
    <div class="results-2017__press-release__container">
        <span class="results-2017__press-release__eyebrow">NOTA DE PREMSA</span>
        <h3>La connexió entre els carrers Filharmònica i Empedrat, projecte més votat al procés participatiu de l’Ajuntament d’Altea</h3>
        <p class="results-2017__press-release__subtitle">La posada a punt de la Casa de l’Aigua per poder ser utilitzada en condicions i el condicionament del solar contigu al conservatori, els altres dos punts més votats.</p>
        <p>Enguany per primera vegada s’ha encetat un procés participatiu amb les veïnes i veïns d’Altea perquè decidiren una part de les inversions del pressupost de l’Ajuntament. Un procés encapçalat per la Regidoria de Participació Ciutadana i que pretén que la societat comence a involucrar-se en la presa de decisions del seu poble.</p>
        <p>En les societats actuals la democràcia representativa és insuficient per a garantir l’eficàcia i l’eficiència en la gestió pública i, cada vegada més, es fa imprescindible incloure els ciutadans i ciutadanes en els processos deliberatius, i decisionals de la gestió del seu Ajuntament.</p>
        <p>Per començar aquest procés participatiu, la regidoria de Participació Ciutadana va donar a elegir tres dels dotze projectes elegibles en una votació que finalitzava el passat 31 d’octubre.</p>
        <p>La propostes més votada va ser l’apertura del carrer Filhàrmònica, en segon lloc la posada a punt de la Casa de l’Aigua per poder ser utilitzada en condicions i per últim, El condicionament del solar contigu al conservatori .</p>
        <p>Mari Laviós, regidora de l’àrea de Participació Ciutadana, vol donar les gràcies a totes aquelles persones que han participat en el procés de votació al mateix temps que espera que en els propers processos la gent participe més, “és difícil conscienciar a la gent que pot i deu decidir en què inverteix una part dels seus pressupostos l’Ajuntament quan abans mai se’ls havia donat eixa oportunitat, i eixa percepció és la que volem treballar perquè canvie”.</p>
        <p>Des de la regidoria de participació ciutadana ja s’està treballant en els pressupostos participatius de l’any vinent, on el procés es farà d’una manera diferent per poder arribar a molta més gent i que participen en aquest projecte encisador com és el d’Altea Participa.</p>
        <p>Departament de Comunicació de l’Ajuntament d’Altea</p>
    </div>
</div>
@endsection
