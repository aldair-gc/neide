export default function buildAllPostsEdit(json) {
    let innerHtmlPostsContainer = "";

    json.forEach((x) => {
        innerHtmlPostsContainer += buildPost(x);
        function buildPost(data) {
            return `
            <div class="post ${data.group}">
            <img class="post-media" src=${data.picture}></img>
            <div class="post-texts">
            <div class="posts-header">
            <div class="posts-title">${data.title}</div>
            <div class="post-control">
                <button class="button" id="post-edit">edit</button>
                <button class="button" id="post-delete">delete</button>
            </div>
            <div class="posts-date">${data.date}</div>
                    </div>
                    <div class="posts-content">${data.content}</div>
                </div>
            </div>
            `;
        }
    });
    return innerHtmlPostsContainer;
}