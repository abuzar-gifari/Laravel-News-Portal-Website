@extends('front.layout.app')
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_data->faq_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page_data->faq_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Lorem ipsum dolor sit amet, ut has quidam prodesset, eos sumo ipsum civibus ea, vel quas nusquam ei. Et sea doming quodsi audire. No vim ornatus scaevola disputando, qui stet ceteros ad. Ad his choro appetere mnesarchum, no duo accusata incorrupte, vel essent fabulas ut.
                                </p>
                                <p>
                                    Ne nam soluta libris. Cu sea utamur adipiscing, convenire patrioque dignissim et nec. Accusam incorrupte vituperatoribus vix ad, ei clita omnium mentitum pro. Est ad duis perpetua recteque, in autem posidonium qui. Illum nulla dolor mea an.
                                </p>
                                <p>
                                    Officiis disputationi ne pri, libris malorum eam id. Molestie principes vix no. Ut velit iudicabit inciderint mea. Malorum mediocrem deseruisse nam ne, tale imperdiet vim ut. Aperiri splendide cu eos, vis in alia laoreet aliquando.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Omnis aliquip mel ne. Diam tantas mea ex, ad magna luptatum qui, cum ea veniam persecuti. Id suavitate prodesset vis. Intellegat intellegam ad mei, nec oblique petentium definitiones in. Vim lorem numquam tibique cu, rebum iriure mediocrem te nam, semper mandamus conceptam an usu.
                                </p>
                                <p>
                                    No unum feugait est, ei ius quem adhuc definitionem. Odio porro decore cu sit, eum adhuc semper dolores id, eam te nostro legimus. Ne utroque patrioque per, in consul nominavi has. Choro patrioque eum ex, erant tacimates persecuti sit an. No nec dicant delenit, vocent regione eam te.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Aliquid sententiae theophrastus qui eu. Vix ad lorem pertinax. Cu labore lucilius recusabo pro, in per temporibus reformidans. Ex scripta fastidii expetendis ius, iudico nusquam et mel.
                                </p>
                                <p>
                                    Et vide legimus maiorum eos, ius an delenit copiosae mandamus. Ex sale intellegebat qui, an admodum theophrastus mei. Vix ne eros ludus legere, sed cu suas torquatos. Feugait consequat nam no, nec causae ullamcorper ex. Mazim saepe vix et.
                                </p>
                                <p>
                                    Eos erat utinam ei, cum saepe everti deleniti et, alterum apeirian qualisque nam ex. Vim id omnesque intellegebat, ut eum solum eruditi, ut viderer recusabo argumentum est. Nam ex elit dolores percipit. Sea quodsi propriae epicurei at, an simul expetendis duo, an vidisse detracto officiis sit. Eu aperiri iuvaret vel.
                                </p>
                                <p>
                                    Id offendit euripidis efficiantur vim, clita virtute eloquentiam ea eum. Te usu iracundia constituam repudiandae, cu nam laudem delicata intellegam. Dico theophrastus sed ex. Ex vis zril nominati recteque, tollit vituperatoribus an sit, epicurei temporibus concludaturque et mei.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection