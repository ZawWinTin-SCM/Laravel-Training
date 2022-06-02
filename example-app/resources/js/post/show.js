document.addEventListener("alpine:init", () => {
    Alpine.data("app", () => ({
        ...alpineData,
        init() {
            Echo.private("vote-live." + this.postId).listen("VoteUpdated", (e) => {
                $("#voteCount").text(e.post.no_of_votes).end();
            });
        },
        vote() {
            axios
                .post(this.voteLink)
                .then((res) => {
                    message = res.data.message;
                    post = res.data.post;
                    console.log(message);
                    $("#voteCount").text(post.no_of_votes).end();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    }));
});
