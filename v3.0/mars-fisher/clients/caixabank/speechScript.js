jQuery(document).ready(function(){

    let langPage = jQuery("html").attr("lang");
    let microLang = langPage === 'ca' ? 'ca-ES' :'es-ES';
    let textVoiceImg = {"es":"Búsqueda por voz","ca":"Cerca per veu","en":"Voice search"};

    checkSpeechAPI();

    async function checkSpeechAPI(){
        const bool = await checkMic();
        if(bool){
                jQuery('#search-field').speechjs({
                language:microLang,
                APIKey:'AIzaSyCy7cxxO0v37chwqTLFOxOmE6EJr6R5tww'
            });
            jQuery(".mic-button").attr("onclick","neoEventSC(pageNameValue + ':' + 'Microphone',pageNameValue + ':' + 'Microphone')");
            jQuery(".mic-button").attr("tabindex","0");
            jQuery(".mic-button").attr("alt",typeof textVoiceImg[langPage] === "undefined" ? textVoiceImg["es"] :textVoiceImg[langPage]);
			jQuery(".mic-button").attr("role","button");
        }
        return bool;
    }

    function checkMic(){
        let userHasMic = false;
        return navigator.mediaDevices.enumerateDevices()
            .catch( e => false)
            .then(devices => {
                for(let d of devices){
                    if(d.kind=="audioinput"){
                        userHasMic = true;
                        break;
                    }
                }
                return userHasMic;
            })
            .catch( e => false);
    }
});