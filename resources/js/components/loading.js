
const Loading = {

    show(elemet, msg){
        elemet.textContent = '';
        elemet.innerHTML += msg + '<i class="fa fa-circle-o-notch fa-spin"></i>';
        elemet.disabled = true;
    },
    hide(elemet, msg){
        elemet.textContent = '';
        elemet.innerHTML += msg;
        elemet.disabled = false;
    },
}
export default Loading;

