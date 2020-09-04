<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div id="write" class="container mt-5">
    <div class="row mb-5">
        <div class="col-md-8">
            <h2 class="my-2">Type your passage here</h2>
            <div class="card" style="background-color: #fff6f8;border:0px;">
                <div class="card-content pd-5">
                    <textarea v-model="msg" rows="14" placeholder="Write passage here..."
                              style="background-color: transparent;border:0px;"
                              class="form-control">
                            </textarea>
                </div>
            </div>
            <button @click="read" class="btn btn-outline-dark mt-3">Submit</button>
        </div>
        <div class="col-md-4">
            <div v-show="fetched">
                <table class="table" style="font-size: 14px;">
                    <thead>
                    <tr>
                        <th>Analysis Type</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row">WORDS Count</td>
                        <td>@{{score.WORDS}}</td>
                    </tr>
                    <tr>
                        <td scope="row">SENTENCES</td>
                        <td>@{{score.SENTENCES}}</td>
                    </tr>
                    <tr>
                        <td scope="row">COMPLEX WORDS</td>
                        <td>@{{score.COMPLEXWORDS}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Characters</td>
                        <td>@{{score.CHARACTERS}}</td>
                    </tr>
                    <tr>
                        <td scope="row">SYLLABLES</td>
                        <td>@{{score.SYLLABLES}}</td>
                    </tr>
                    <tr>
                        <td scope="row">FLESCH_READING</td>
                        <td>@{{score.FLESCH_READING}}</td>
                    </tr>
                    <tr>
                        <td scope="row">FLESCH_KINCAID</td>
                        <td>@{{score.FLESCH_KINCAID}}</td>
                    </tr>
                    <tr>
                        <td scope="row">COLEMAN_LIAU</td>
                        <td>@{{score.COLEMAN_LIAU}}</td>
                    </tr>

                    <tr>
                        <td scope="row">SMOG_INDEX</td>
                        <td>@{{score.SMOG_INDEX}}</td>
                    </tr>
                    <tr>
                        <td scope="row">GUNNING_FOG</td>
                        <td>@{{score.GUNNING_FOG}}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row" v-show="fetched">
        <div class="col-md-8">
            <div v-for="(err,index) in gbot">
                <div>
                    <p><strong>Text</strong> @{{err.context.text}}</p>
                    <div class="alert alert-warning mt-2" role="alert">
                        <strong>Issue</strong>
                        <p>
                            @{{err.message}}
                        </p>
                        <strong>Issue Type</strong>
                        <p>
                            @{{err.rule.issueType }}
                        </p>
                    </div>
                    <p><strong>Replacements</strong></p>
                    <div v-if="err.replacements.length >0">
                    <ul v-for="word in err.replacements">
                        <li>@{{word.value}}</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="card mt-2 border-0">
                <img class="card-img-top"
                     src="https://readable.com/images/formulas/Flesch-Kincaid-Grade-Level.png"
                     alt="">
                <div class="card-body">
                    <h4 class="card-title">Flesch-Kincaid Grade Level</h4>
                    <span v-show="fetched" class="text-primary"> @{{score.FLESCH_KINCAID}} /18</span>
                    <p>The Flesch-Kincaid grade level was created by Rudolf Flesch as a way to interpret a US grade
                        level from his Reading Ease formula. He originally created it for the US Navy to analyze their
                        technical material. Since then, it's become a widely respected formula suitable for use with
                        many types of text.</p>
                    <p class="tac" style="margin-bottom: 40px; font-size: 14px;">
                        Ideal For: <strong>General Usage</strong> &nbsp; &nbsp; &nbsp;
                        Created: <strong>1975</strong> &nbsp; &nbsp; &nbsp;
                        Target Score: <strong>&lt; 8-10</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-2 border-0">
                <img class="card-img-top"
                     src="https://readable.com/images/formulas/Gunning-Fog-Score.png"
                     alt="">
                <div class="card-body">
                    <h4 class="card-title">Gunning Fog Index</h4>
                    <span v-show="fetched" class="text-primary"> @{{score.GUNNING_FOG}} /18</span>
                    <p>The Gunning Fog Index was created by Robert Gunning, an American businessman. His consultancy,
                        Robert Gunning Associates, aimed to help other businesses with their writing. This formula helps
                        a writer win an audience by clearing unnecessary fog in their text.</p>
                    <p class="tac" style="margin-bottom: 40px; font-size: 14px;">
                        Ideal For: <strong>Business Literature</strong> &nbsp; &nbsp; &nbsp;
                        Created: <strong>1952</strong> &nbsp; &nbsp; &nbsp;
                        Target Score: <strong>&lt; 8-10</strong>
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    var vm = new Vue({
        el: '#write',
        data: {
            msg: '',
            score: {},
            fetched: false,
            gbot: {},
        },
        methods: {
            read() {
                // this.gbot = axios.get('http://api.grammarbot.io/v2/check?api_key=KS9C5N3Y&text='+this
                //     .msg+'&language=en-US');
                axios.post(`{{route('writeAPI')}}`, {
                    body: this.msg
                })
                    .then(response => {
                        this.score = response.data[1].body;
                        this.gbot = response.data[0].matches;
                        this.fetched = true;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });
                console.log('Started');
            },
        }
    });
</script>
</body>
</html>