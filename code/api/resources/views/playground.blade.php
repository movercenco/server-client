@verbatim
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Playground</title>
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
</head>

<body>
    <div id="app">
        <el-row :gutter="20">
            <el-col :span="4">
                <el-menu default-active="3" class="el-menu-vertical-demo" theme="dark" @select="handleSelect">
                    <el-menu-item index="3">Readme</el-menu-item>
                    <el-menu-item index="1">Models</el-menu-item>
                    <el-menu-item index="2">Upload File</el-menu-item>
                    <el-menu-item index="4">Upload Image</el-menu-item>
                </el-menu>
            </el-col>
            <el-col :span="20">
                <el-card class="box-card" v-if="selectIndex == 3">
                    <vue-markdown :anchor-attributes="anchorAttrs" :source="readme"></vue-markdown>
                </el-card>
                <el-card class="box-card" v-if="selectIndex == 1">
                    <el-button-group>
                        <el-button v-for="(model, index) in models" :key="index" @click="showHelpText(index)"> {{ model.name }} </el-button>
                    </el-button-group>
                    <div>
                        <p>All Attributes</p><pre><code> {{ allAttributesText }}</code></pre></div>
                    <div>
                        <p>Fillable Attributes</p><pre><code> {{ fillableAttributesText }}</code></pre></div>
                    <div>
                        <p>Avaiable Methods</p><pre><code> {{ methodsText}} </code></pre></div>
                </el-card>
                <el-card class="box-card" v-if="selectIndex == 2" style="padding-bottom:20px">
                    <el-upload drag action="/files/upload" multiple><i class="el-icon-upload"></i>
                        <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                    </el-upload>
                </el-card>
                <el-card class="box-card" v-if="selectIndex == 4" style="padding-bottom:20px">
                    <el-upload drag action="/images/upload" :file-list="fileList" list-type="picture" multiple><i class="el-icon-upload"></i>
                        <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                        <div slot="tip" class="el-upload__tip">try to upload an image!</div>
                    </el-upload>
                </el-card>
            </el-col>
        </el-row>
    </div>
    <script>
        window._playground = true;
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.js"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://unpkg.com/element-ui/lib/umd/locale/en.js"></script>
    <script src="https://unpkg.com/vue-markdown/dist/vue-markdown.js"></script>
    <script src="api.js"></script>
    <script>
        ELEMENT.locale(ELEMENT.lang.en);
        Vue.use(VueMarkdown);
        var app = new Vue({
                el: '#app',
                data: {
                    models: [],
                    methodsText: 'Choose Model To View Methods',
                    fillableAttributesText: 'Choose Model To View Attributes',
                    allAttributesText: 'Choose Model To View Attributes',
                    selectIndex: 3,
                    fileList: [],
                    readme: '',
                    anchorAttrs: {
                        target: '_blank',
                        rel: 'noopener noreferrer nofollow'
                    },
                },
                mounted() {
                    _.each(window.Api, model => {
                        if (model.name && model.name != 'wrap') {
                            this.models.push(model)
                        }
                    });
                    window.Api.axios.get('/readme').then(res => this.readme = res.data).catch(err => this.readme = 'Fetch Readme Error!');
                },
                methods: {
                    handleSelect(index) {
                        this.selectIndex = index;
                    },
                    showHelpText(index) {
                        this.methodsText = this.models[index].availableMethods;
                        this.models[index].getFillableAttributes().then(res => this.fillableAttributesText = res.data).catch(err => this.fillableAttributesText = err);
                        this.models[index].getAllAttributes().then(res => this.allAttributesText = res.data).catch(err => this.allAttributesText = err);
                    }
                },
            }

        )
    </script>
</body>

</html>
@endverbatim