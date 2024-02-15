const Post = {
    init : () => {
        Post.showMetaTitlePost();
    },
    showMetaTitlePost : () => {
        if (TITLE_POST) {
            console.log(TITLE_POST);
            document.title = TITLE_POST;
        }
    }
}
Post.init();