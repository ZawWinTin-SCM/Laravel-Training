/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/post/show.js ***!
  \***********************************/
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

document.addEventListener("alpine:init", function () {
  Alpine.data("app", function () {
    return _objectSpread(_objectSpread({}, alpineData), {}, {
      init: function init() {
        Echo["private"]("vote-live." + this.postId).listen("VoteUpdated", function (e) {
          $("#voteCount").text(e.post.no_of_votes).end();
        });
      },
      vote: function vote() {
        axios.post(this.voteLink).then(function (res) {
          message = res.data.message;
          post = res.data.post;
          console.log(message);
          $("#voteCount").text(post.no_of_votes).end();
        })["catch"](function (error) {
          console.log(error);
        });
      }
    });
  });
});
/******/ })()
;