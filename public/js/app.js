var url = window.location.href
function done(id) {
    console.log(id)
    let card = $(".task[data-id='" + id + "']");
    $.ajax({
        type: "GET",
        url: url + "taskDone/" + id,
        success: function (response) {
            card.fadeOut('slow', function () {
                card.removeClass('d-flex');
            });
        }
    });
}

function remove(id) {
    let card = $(".task[data-id='" + id + "']");;
    $.ajax({
        type: "GET",
        url: url + "removeTask/" + id,
        success: function (response) {
            console.log($(this));
            card.fadeOut('200', function () {
                card.removeClass('d-flex');
            });
        }
    });
}

$(document).ready(function () {


    /*     buttonEvents(); */

    $("#createTask").on("submit", function (event) {
        event.preventDefault();

        if ($("#content").val() != "") {
            $.ajax({
                type: "GET",
                url: url + "uploadTask/" + $("#content").val(),
                success: function (response) {
                    let domContent = $("<div class='task d-flex col-12 mb-2 mt-2' data-id='" + response + "'> <div class='hijo d-flex align-content-center col-11' ><i class='fas fa-times remove'  onclick='remove(" + response + ")'></i><p class='tarea'>" + $("#content").val() + "</p></div> <i class='fas fa-check done' onclick='done(" + response + ")'></i> </div > ").hide().fadeIn('500');

                    $(".card-body").append(domContent);
                    $("#content").val("");
                }
            });
        }

    })
});