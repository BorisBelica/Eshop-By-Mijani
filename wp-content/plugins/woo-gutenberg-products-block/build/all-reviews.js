this.wc=this.wc||{},this.wc.blocks=this.wc.blocks||{},this.wc.blocks["all-reviews"]=function(e){function t(t){for(var n,i,a=t[0],s=t[1],l=t[2],b=0,d=[];b<a.length;b++)i=a[b],Object.prototype.hasOwnProperty.call(o,i)&&o[i]&&d.push(o[i][0]),o[i]=0;for(n in s)Object.prototype.hasOwnProperty.call(s,n)&&(e[n]=s[n]);for(u&&u(t);d.length;)d.shift()();return c.push.apply(c,l||[]),r()}function r(){for(var e,t=0;t<c.length;t++){for(var r=c[t],n=!0,a=1;a<r.length;a++){var s=r[a];0!==o[s]&&(n=!1)}n&&(c.splice(t--,1),e=i(i.s=r[0]))}return e}var n={},o={6:0},c=[];function i(t){if(n[t])return n[t].exports;var r=n[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,i),r.l=!0,r.exports}i.m=e,i.c=n,i.d=function(e,t,r){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(i.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)i.d(r,n,function(t){return e[t]}.bind(null,n));return r},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="";var a=window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[],s=a.push.bind(a);a.push=t,a=a.slice();for(var l=0;l<a.length;l++)t(a[l]);var u=s;return c.push([868,2,0,1]),r()}({0:function(e,t){!function(){e.exports=this.wp.element}()},1:function(e,t){!function(){e.exports=this.wp.i18n}()},13:function(e,t){!function(){e.exports=this.wp.apiFetch}()},135:function(e,t,r){"use strict";r.d(t,"a",(function(){return b})),r.d(t,"b",(function(){return d})),r.d(t,"c",(function(){return p}));var n=r(0),o=r(1),c=r(183),i=r(4),a=r(22),s=r(3),l=r(5),u=r(71),b=function(e,t){return Object(n.createElement)(a.BlockControls,null,Object(n.createElement)(i.Toolbar,{controls:[{icon:"edit",title:Object(o.__)("Edit","woo-gutenberg-products-block"),onClick:function(){return t({editMode:!e})},isActive:e}]}))},d=function(e,t){return Object(n.createElement)(n.Fragment,null,Object(n.createElement)(i.ToggleControl,{label:Object(o.__)("Product rating","woo-gutenberg-products-block"),checked:e.showReviewRating,onChange:function(){return t({showReviewRating:!e.showReviewRating})}}),e.showReviewRating&&!l.G&&Object(n.createElement)(i.Notice,{className:"wc-block-base-control-notice",isDismissible:!1},Object(c.a)(Object(o.__)("Product rating is disabled in your <a>store settings</a>.","woo-gutenberg-products-block"),{a:Object(n.createElement)("a",{href:Object(s.getAdminLink)("admin.php?page=wc-settings&tab=products"),target:"_blank",rel:"noopener noreferrer"})})),Object(n.createElement)(i.ToggleControl,{label:Object(o.__)("Reviewer name","woo-gutenberg-products-block"),checked:e.showReviewerName,onChange:function(){return t({showReviewerName:!e.showReviewerName})}}),Object(n.createElement)(i.ToggleControl,{label:Object(o.__)("Image","woo-gutenberg-products-block"),checked:e.showReviewImage,onChange:function(){return t({showReviewImage:!e.showReviewImage})}}),Object(n.createElement)(i.ToggleControl,{label:Object(o.__)("Review date","woo-gutenberg-products-block"),checked:e.showReviewDate,onChange:function(){return t({showReviewDate:!e.showReviewDate})}}),Object(n.createElement)(i.ToggleControl,{label:Object(o.__)("Review content","woo-gutenberg-products-block"),checked:e.showReviewContent,onChange:function(){return t({showReviewContent:!e.showReviewContent})}}),e.showReviewImage&&Object(n.createElement)(n.Fragment,null,Object(n.createElement)(u.a,{label:Object(o.__)("Review image","woo-gutenberg-products-block"),value:e.imageType,options:[{label:Object(o.__)("Reviewer photo","woo-gutenberg-products-block"),value:"reviewer"},{label:Object(o.__)("Product","woo-gutenberg-products-block"),value:"product"}],onChange:function(e){return t({imageType:e})}}),"reviewer"===e.imageType&&!l.M&&Object(n.createElement)(i.Notice,{className:"wc-block-base-control-notice",isDismissible:!1},Object(c.a)(Object(o.__)("Reviewer photo is disabled in your <a>site settings</a>.","woo-gutenberg-products-block"),{a:Object(n.createElement)("a",{href:Object(s.getAdminLink)("options-discussion.php"),target:"_blank",rel:"noopener noreferrer"})}))))},p=function(e,t){return Object(n.createElement)(n.Fragment,null,Object(n.createElement)(i.ToggleControl,{label:Object(o.__)("Order by","woo-gutenberg-products-block"),checked:e.showOrderby,onChange:function(){return t({showOrderby:!e.showOrderby})}}),Object(n.createElement)(i.SelectControl,{label:Object(o.__)("Order Product Reviews by","woo-gutenberg-products-block"),value:e.orderby,options:[{label:"Most recent",value:"most-recent"},{label:"Highest Rating",value:"highest-rating"},{label:"Lowest Rating",value:"lowest-rating"}],onChange:function(e){return t({orderby:e})}}),Object(n.createElement)(i.RangeControl,{label:Object(o.__)("Starting Number of Reviews","woo-gutenberg-products-block"),value:e.reviewsOnPageLoad,onChange:function(e){return t({reviewsOnPageLoad:e})},max:20,min:1}),Object(n.createElement)(i.ToggleControl,{label:Object(o.__)("Load more","woo-gutenberg-products-block"),checked:e.showLoadMore,onChange:function(){return t({showLoadMore:!e.showLoadMore})}}),e.showLoadMore&&Object(n.createElement)(i.RangeControl,{label:Object(o.__)("Load More Reviews","woo-gutenberg-products-block"),value:e.reviewsOnLoadMore,onChange:function(e){return t({reviewsOnLoadMore:e})},max:20,min:1}))}},141:function(e,t,r){"use strict";var n=r(0),o=r(60),c=Object(n.createElement)(o.a,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(n.createElement)("path",{d:"M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"}));t.a=c},144:function(e,t,r){},146:function(e,t,r){"use strict";var n=r(0),o=(r(2),r(7)),c=r.n(o),i=r(44),a=r(184);r(284);t.a=Object(a.a)((function(e){var t=e.className,r=e.instanceId,o=e.defaultValue,a=e.label,s=e.onChange,l=e.options,u=e.screenReaderLabel,b=e.readOnly,d=e.value,p="wc-block-components-sort-select__select-".concat(r);return Object(n.createElement)("div",{className:c()("wc-block-sort-select","wc-block-components-sort-select",t)},Object(n.createElement)(i.a,{label:a,screenReaderLabel:u,wrapperElement:"label",wrapperProps:{className:"wc-block-sort-select__label wc-block-components-sort-select__label",htmlFor:p}}),Object(n.createElement)("select",{id:p,className:"wc-block-sort-select__select wc-block-components-sort-select__select",defaultValue:o,onChange:s,readOnly:b,value:d},l.map((function(e){return Object(n.createElement)("option",{key:e.key,value:e.key},e.label)}))))}))},15:function(e,t){!function(){e.exports=this.wp.blocks}()},153:function(e,t,r){"use strict";r.d(t,"a",(function(){return c}));var n=r(1),o=r(5),c={attributes:{editMode:!1,imageType:"reviewer",orderby:"most-recent",reviewsOnLoadMore:10,reviewsOnPageLoad:10,showLoadMore:!0,showOrderby:!0,showReviewDate:!0,showReviewerName:!0,showReviewImage:!0,showReviewRating:!0,showReviewContent:!0,previewReviews:[{id:1,date_created:"2019-07-15T17:05:04",formatted_date_created:Object(n.__)("July 15, 2019","woo-gutenberg-products-block"),date_created_gmt:"2019-07-15T15:05:04",product_id:0,product_name:Object(n.__)("WordPress Pennant","woo-gutenberg-products-block"),product_permalink:"#",reviewer:Object(n.__)("Alice","woo-gutenberg-products-block"),review:"<p>".concat(Object(n.__)("I bought this product last week and I'm very happy with it.","woo-gutenberg-products-block"),"</p>\n"),reviewer_avatar_urls:{48:o.Q+"img/avatar.jpg",96:o.Q+"img/avatar.jpg"},rating:5,verified:!0},{id:2,date_created:"2019-07-12T12:39:39",formatted_date_created:Object(n.__)("July 12, 2019","woo-gutenberg-products-block"),date_created_gmt:"2019-07-12T10:39:39",product_id:0,product_name:Object(n.__)("WordPress Pennant","woo-gutenberg-products-block"),product_permalink:"#",reviewer:Object(n.__)("Bob","woo-gutenberg-products-block"),review:"<p>".concat(Object(n.__)("This product is awesome, I love it!","woo-gutenberg-products-block"),"</p>\n"),reviewer_avatar_urls:{48:o.Q+"img/avatar.jpg",96:o.Q+"img/avatar.jpg"},rating:null,verified:!1}]}}},16:function(e,t){!function(){e.exports=this.regeneratorRuntime}()},171:function(e,t,r){},176:function(e,t,r){"use strict";t.a={editMode:{type:"boolean",default:!0},imageType:{type:"string",default:"reviewer"},orderby:{type:"string",default:"most-recent"},reviewsOnLoadMore:{type:"number",default:10},reviewsOnPageLoad:{type:"number",default:10},showLoadMore:{type:"boolean",default:!0},showOrderby:{type:"boolean",default:!0},showReviewDate:{type:"boolean",default:!0},showReviewerName:{type:"boolean",default:!0},showReviewImage:{type:"boolean",default:!0},showReviewRating:{type:"boolean",default:!0},showReviewContent:{type:"boolean",default:!0},previewReviews:{type:"array",default:null}}},177:function(e,t,r){"use strict";var n=r(10),o=r.n(n),c=r(0),i=(r(171),r(78));t.a=function(e){var t=e.attributes,r=t.categoryIds,n=t.imageType,a=t.orderby,s=t.productId,l={"data-image-type":n,"data-orderby":a,"data-reviews-on-page-load":t.reviewsOnPageLoad,"data-reviews-on-load-more":t.reviewsOnLoadMore,"data-show-load-more":t.showLoadMore,"data-show-orderby":t.showOrderby},u="wc-block-all-reviews";return s&&(l["data-product-id"]=s,u="wc-block-reviews-by-product"),Array.isArray(r)&&(l["data-category-ids"]=r.join(","),u="wc-block-reviews-by-category"),Object(c.createElement)("div",o()({className:Object(i.a)(u,t)},l))}},180:function(e,t,r){"use strict";var n=r(23),o=r.n(n),c=r(26),i=r.n(c),a=r(24),s=r.n(a),l=r(25),u=r.n(l),b=r(12),d=r.n(b),p=r(0),w=r(1),g=r(9),f=(r(2),r(6)),m=r(4),v=r(5),h=r(91),O=r(44),j=(r(350),function(e){var t=e.onClick,r=e.label,n=e.screenReaderLabel;return Object(p.createElement)("div",{className:"wp-block-button wc-block-load-more wc-block-components-load-more"},Object(p.createElement)("button",{className:"wp-block-button__link",onClick:t},Object(p.createElement)(O.a,{label:r,screenReaderLabel:n})))});j.defaultProps={label:Object(w.__)("Load more","woo-gutenberg-products-block")};var y=j,_=r(146),k=(r(347),function(e){var t=e.defaultValue,r=e.onChange,n=e.readOnly,o=e.value;return Object(p.createElement)(_.a,{className:"wc-block-review-sort-select wc-block-components-review-sort-select",defaultValue:t,label:Object(w.__)("Order by","woo-gutenberg-products-block"),onChange:r,options:[{key:"most-recent",label:Object(w.__)("Most recent","woo-gutenberg-products-block")},{key:"highest-rating",label:Object(w.__)("Highest rating","woo-gutenberg-products-block")},{key:"lowest-rating",label:Object(w.__)("Lowest rating","woo-gutenberg-products-block")}],readOnly:n,screenReaderLabel:Object(w.__)("Order reviews by","woo-gutenberg-products-block"),value:o})}),R=r(8),E=r.n(R),P=r(7),S=r.n(P),C=r(20),N=r.n(C),x=r(233),L=r.n(x),T=function(e,t){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"...",n=L()(e,{suffix:r,limit:t});return n.html},D=function(e,t,r,n){var o=I(e,t,r);return T(e,o-n.length,n)},I=function(e,t,r){for(var n={start:0,middle:0,end:e.length};n.start<=n.end;)n.middle=Math.floor((n.start+n.end)/2),t.innerHTML=T(e,n.middle),n=M(n,t.clientHeight,r);return n.middle},M=function(e,t,r){return t<=r?e.start=e.middle+1:e.end=e.middle-1,e};function A(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=d()(e);if(t){var o=d()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return u()(this,r)}}var B=function(e){s()(r,e);var t=A(r);function r(e){var n;return o()(this,r),(n=t.apply(this,arguments)).state={isExpanded:!1,clampEnabled:null,content:e.children,summary:"."},n.reviewSummary=Object(g.createRef)(),n.reviewContent=Object(g.createRef)(),n.getButton=n.getButton.bind(N()(n)),n.onClick=n.onClick.bind(N()(n)),n}return i()(r,[{key:"componentDidMount",value:function(){if(this.props.children){var e=this.props,t=e.maxLines,r=e.ellipsis,n=(this.reviewSummary.current.clientHeight+1)*t+1,o=this.reviewContent.current.clientHeight+1>n;this.setState({clampEnabled:o}),o&&this.setState({summary:D(this.reviewContent.current.innerHTML,this.reviewSummary.current,n,r)})}}},{key:"getButton",value:function(){var e=this.state.isExpanded,t=this.props,r=t.className,n=t.lessText,o=t.moreText,c=e?n:o;if(c)return Object(p.createElement)("a",{href:"#more",className:r+"__read_more",onClick:this.onClick,"aria-expanded":!e,role:"button"},c)}},{key:"onClick",value:function(e){e.preventDefault();var t=this.state.isExpanded;this.setState({isExpanded:!t})}},{key:"render",value:function(){var e=this.props.className,t=this.state,r=t.content,n=t.summary,o=t.clampEnabled,c=t.isExpanded;return r?!1===o?Object(p.createElement)("div",{className:e},Object(p.createElement)("div",{ref:this.reviewContent},r)):Object(p.createElement)("div",{className:e},(!c||null===o)&&Object(p.createElement)("div",{ref:this.reviewSummary,"aria-hidden":c,dangerouslySetInnerHTML:{__html:n}}),(c||null===o)&&Object(p.createElement)("div",{ref:this.reviewContent,"aria-hidden":!c},r),this.getButton()):null}}]),r}(g.Component);B.defaultProps={maxLines:3,ellipsis:"&hellip;",moreText:Object(w.__)("Read more","woo-gutenberg-products-block"),lessText:Object(w.__)("Read less","woo-gutenberg-products-block"),className:"read-more-content"};var H=B;r(349);var F=function(e){var t=e.attributes,r=e.review,n=void 0===r?{}:r,o=t.imageType,c=t.showReviewDate,i=t.showReviewerName,a=t.showReviewImage,s=t.showReviewRating,l=t.showReviewContent,u=t.showProductName,b=n.rating,d=!Object.keys(n).length>0,g=Number.isFinite(b)&&s;return Object(p.createElement)("li",{className:S()("wc-block-review-list-item__item","wc-block-components-review-list-item__item",{"is-loading":d}),"aria-hidden":d},(u||c||i||a||g)&&Object(p.createElement)("div",{className:"wc-block-review-list-item__info wc-block-components-review-list-item__info"},a&&function(e,t,r){var n,o;return r||!e?Object(p.createElement)("div",{className:"wc-block-review-list-item__image wc-block-components-review-list-item__image",width:"48",height:"48"}):Object(p.createElement)("div",{className:"wc-block-review-list-item__image wc-block-components-review-list-item__image"},"product"===t?Object(p.createElement)("img",{"aria-hidden":"true",alt:(null===(n=e.product_image)||void 0===n?void 0:n.alt)||"",src:(null===(o=e.product_image)||void 0===o?void 0:o.thumbnail)||""}):Object(p.createElement)("img",{"aria-hidden":"true",alt:"",src:e.reviewer_avatar_urls[48]||"",srcSet:e.reviewer_avatar_urls[96]+" 2x"}),e.verified&&Object(p.createElement)("div",{className:"wc-block-review-list-item__verified wc-block-components-review-list-item__verified",title:Object(w.__)("Verified buyer","woo-gutenberg-products-block")},Object(w.__)("Verified buyer","woo-gutenberg-products-block")))}(n,o,d),(u||i||g||c)&&Object(p.createElement)("div",{className:"wc-block-review-list-item__meta wc-block-components-review-list-item__meta"},g&&function(e){var t=e.rating,r={width:t/5*100+"%"};return Object(p.createElement)("div",{className:"wc-block-review-list-item__rating wc-block-components-review-list-item__rating"},Object(p.createElement)("div",{className:"wc-block-review-list-item__rating__stars wc-block-components-review-list-item__rating__stars",role:"img"},Object(p.createElement)("span",{style:r},Object(w.sprintf)(Object(w.__)("Rated %f out of 5","woo-gutenberg-products-block"),t))))}(n),u&&function(e){return Object(p.createElement)("div",{className:"wc-block-review-list-item__product wc-block-components-review-list-item__product"},Object(p.createElement)("a",{href:e.product_permalink,dangerouslySetInnerHTML:{__html:e.product_name}}))}(n),i&&function(e){var t=e.reviewer,r=void 0===t?"":t;return Object(p.createElement)("div",{className:"wc-block-review-list-item__author wc-block-components-review-list-item__author"},r)}(n),c&&function(e){var t=e.date_created,r=e.formatted_date_created;return Object(p.createElement)("time",{className:"wc-block-review-list-item__published-date wc-block-components-review-list-item__published-date",dateTime:t},r)}(n))),l&&function(e){return Object(p.createElement)(H,{maxLines:10,moreText:Object(w.__)("Read full review","woo-gutenberg-products-block"),lessText:Object(w.__)("Hide full review","woo-gutenberg-products-block"),className:"wc-block-review-list-item__text wc-block-components-review-list-item__text"},Object(p.createElement)("div",{dangerouslySetInnerHTML:{__html:e.review||""}}))}(n))};r(348);function V(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function z(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?V(Object(r),!0).forEach((function(t){E()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):V(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var G=function(e){var t=e.attributes,r=e.reviews,n=(v.M||"product"===t.imageType)&&t.showReviewImage,o=v.G&&t.showReviewRating,c=z(z({},t),{},{showReviewImage:n,showReviewRating:o});return Object(p.createElement)("ul",{className:"wc-block-review-list wc-block-components-review-list"},0===r.length?Object(p.createElement)(F,{attributes:c}):r.map((function(e,t){return Object(p.createElement)(F,{key:e.id||t,attributes:c,review:e})})))},W=r(10),J=r.n(W),Q=r(16),U=r.n(Q),q=r(39),K=r.n(q),Y=r(48),X=r.n(Y),Z=r(78),$=r(43);function ee(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=d()(e);if(t){var o=d()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return u()(this,r)}}function te(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=d()(e);if(t){var o=d()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return u()(this,r)}}var re=function(e){var t=function(t){s()(n,t);var r=ee(n);function n(){var e;o()(this,n);for(var t=arguments.length,c=new Array(t),i=0;i<t;i++)c[i]=arguments[i];return e=r.call.apply(r,[this].concat(c)),E()(N()(e),"isPreview",!!e.props.attributes.previewReviews),E()(N()(e),"delayedAppendReviews",e.props.delayFunction(e.appendReviews)),E()(N()(e),"state",{error:null,loading:!0,reviews:e.isPreview?e.props.attributes.previewReviews:[],totalReviews:e.isPreview?e.props.attributes.previewReviews.length:0}),E()(N()(e),"setError",function(){var t=K()(U.a.mark((function t(r){var n,o;return U.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return n=e.props.onReviewsLoadError,t.next=3,Object($.a)(r);case 3:o=t.sent,e.setState({reviews:[],loading:!1,error:o}),n(o);case 6:case"end":return t.stop()}}),t)})));return function(e){return t.apply(this,arguments)}}()),e}return i()(n,[{key:"componentDidMount",value:function(){this.replaceReviews()}},{key:"componentDidUpdate",value:function(e){e.reviewsToDisplay<this.props.reviewsToDisplay?this.delayedAppendReviews():this.shouldReplaceReviews(e,this.props)&&this.replaceReviews()}},{key:"shouldReplaceReviews",value:function(e,t){return e.orderby!==t.orderby||e.order!==t.order||e.productId!==t.productId||!X()(e.categoryIds,t.categoryIds)}},{key:"componentWillUnMount",value:function(){this.delayedAppendReviews.cancel&&this.delayedAppendReviews.cancel()}},{key:"getArgs",value:function(e){var t=this.props,r=t.categoryIds,n=t.order,o=t.orderby,c=t.productId,i={order:n,orderby:o,per_page:t.reviewsToDisplay-e,offset:e};return r&&r.length&&(i.category_id=Array.isArray(r)?r.join(","):r),c&&(i.product_id=c),i}},{key:"replaceReviews",value:function(){if(!this.isPreview){var e=this.props.onReviewsReplaced;this.updateListOfReviews().then(e)}}},{key:"appendReviews",value:function(){if(!this.isPreview){var e=this.props,t=e.onReviewsAppended,r=e.reviewsToDisplay,n=this.state.reviews;r<=n.length||this.updateListOfReviews(n).then(t)}}},{key:"updateListOfReviews",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],r=this.props.reviewsToDisplay,n=this.state.totalReviews,o=Math.min(n,r)-t.length;return this.setState({loading:!0,reviews:t.concat(Array(o).fill({}))}),Object(Z.b)(this.getArgs(t.length)).then((function(r){var n=r.reviews,o=r.totalReviews;return e.setState({reviews:t.filter((function(e){return Object.keys(e).length})).concat(n),totalReviews:o,loading:!1,error:null}),{newReviews:n}})).catch(this.setError)}},{key:"render",value:function(){var t=this.props.reviewsToDisplay,r=this.state,n=r.error,o=r.loading,c=r.reviews,i=r.totalReviews;return Object(p.createElement)(e,J()({},this.props,{error:n,isLoading:o,reviews:c.slice(0,t),totalReviews:i}))}}]),n}(g.Component);E()(t,"defaultProps",{delayFunction:function(e){return e},onReviewsAppended:function(){},onReviewsLoadError:function(){},onReviewsReplaced:function(){}});var r=e.displayName,n=void 0===r?e.name||"Component":r;return t.displayName="WithReviews( ".concat(n," )"),t}(function(e){s()(r,e);var t=te(r);function r(){return o()(this,r),t.apply(this,arguments)}return i()(r,[{key:"render",value:function(){var e=this.props,t=e.attributes,r=e.error,n=e.isLoading,o=e.noReviewsPlaceholder,c=e.reviews,i=e.totalReviews;return r?Object(p.createElement)(h.a,{className:"wc-block-featured-product-error",error:r,isLoading:n}):0!==c.length||n?Object(p.createElement)(m.Disabled,null,t.showOrderby&&v.G&&Object(p.createElement)(k,{readOnly:!0,value:t.orderby}),Object(p.createElement)(G,{attributes:t,reviews:c}),t.showLoadMore&&i>c.length&&Object(p.createElement)(y,{screenReaderLabel:Object(w.__)("Load more reviews","woo-gutenberg-products-block")})):Object(p.createElement)(o,{attributes:t})}}]),r}(g.Component));function ne(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=d()(e);if(t){var o=d()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return u()(this,r)}}var oe=function(e){s()(r,e);var t=ne(r);function r(){return o()(this,r),t.apply(this,arguments)}return i()(r,[{key:"renderHiddenContentPlaceholder",value:function(){var e=this.props,t=e.icon,r=e.name;return Object(p.createElement)(m.Placeholder,{icon:t,label:r},Object(w.__)("The content for this block is hidden due to block settings.","woo-gutenberg-products-block"))}},{key:"render",value:function(){var e=this.props,t=e.attributes,r=e.className,n=e.noReviewsPlaceholder,o=t.categoryIds,c=t.productId,i=t.reviewsOnPageLoad,a=t.showProductName,s=t.showReviewDate,l=t.showReviewerName,u=t.showReviewContent,b=t.showReviewImage,d=t.showReviewRating,w=Object(Z.c)(t.orderby),g=w.order,m=w.orderby;return!(u||d||s||l||b||a)?this.renderHiddenContentPlaceholder():Object(p.createElement)("div",{className:Object(Z.a)(r,t)},Object(p.createElement)(re,{attributes:t,categoryIds:o,delayFunction:function(e){return Object(f.debounce)(e,400)},noReviewsPlaceholder:n,orderby:m,order:g,productId:c,reviewsToDisplay:i}))}}]),r}(g.Component);t.a=oe},21:function(e,t){!function(){e.exports=this.wp.compose}()},22:function(e,t){!function(){e.exports=this.wp.blockEditor}()},3:function(e,t){!function(){e.exports=this.wc.wcSettings}()},4:function(e,t){!function(){e.exports=this.wp.components}()},43:function(e,t,r){"use strict";r.d(t,"a",(function(){return a}));var n=r(16),o=r.n(n),c=r(39),i=r.n(c),a=function(){var e=i()(o.a.mark((function e(t){var r;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if("function"!=typeof t.json){e.next=11;break}return e.prev=1,e.next=4,t.json();case 4:return r=e.sent,e.abrupt("return",{message:r.message,type:r.type||"api"});case 8:return e.prev=8,e.t0=e.catch(1),e.abrupt("return",{message:e.t0.message,type:"general"});case 11:return e.abrupt("return",{message:t.message,type:t.type||"general"});case 12:case"end":return e.stop()}}),e,null,[[1,8]])})));return function(t){return e.apply(this,arguments)}}()},44:function(e,t,r){"use strict";var n=r(8),o=r.n(n),c=r(0),i=(r(2),r(9)),a=r(7),s=r.n(a);function l(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function u(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?l(Object(r),!0).forEach((function(t){o()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):l(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var b=function(e){var t,r=e.label,n=e.screenReaderLabel,o=e.wrapperElement,a=e.wrapperProps,l=null!=r,b=null!=n;return!l&&b?(t=o||"span",a=u(u({},a),{},{className:s()(a.className,"screen-reader-text")}),Object(c.createElement)(t,a,n)):(t=o||i.Fragment,l&&b&&r!==n?Object(c.createElement)(t,a,Object(c.createElement)("span",{"aria-hidden":"true"},r),Object(c.createElement)("span",{className:"screen-reader-text"},n)):Object(c.createElement)(t,a,r))};b.defaultProps={wrapperProps:{}},t.a=b},47:function(e,t){!function(){e.exports=this.wp.escapeHtml}()},48:function(e,t){!function(){e.exports=this.wp.isShallowEqual}()},49:function(e,t,r){"use strict";var n=r(0),o=r(1),c=(r(2),r(47));t.a=function(e){var t,r,i,a=e.error;return Object(n.createElement)("div",{className:"wc-block-error-message"},(r=(t=a).message,i=t.type,r?"general"===i?Object(n.createElement)("span",null,Object(o.__)("The following error was returned","woo-gutenberg-products-block"),Object(n.createElement)("br",null),Object(n.createElement)("code",null,Object(c.escapeHTML)(r))):"api"===i?Object(n.createElement)("span",null,Object(o.__)("The following error was returned from the API","woo-gutenberg-products-block"),Object(n.createElement)("br",null),Object(n.createElement)("code",null,Object(c.escapeHTML)(r))):r:Object(o.__)("An unknown error occurred which prevented the block from being updated.","woo-gutenberg-products-block")))}},5:function(e,t,r){"use strict";r.d(t,"k",(function(){return o})),r.d(t,"G",(function(){return c})),r.d(t,"M",(function(){return i})),r.d(t,"x",(function(){return a})),r.d(t,"z",(function(){return s})),r.d(t,"l",(function(){return l})),r.d(t,"y",(function(){return u})),r.d(t,"B",(function(){return b})),r.d(t,"n",(function(){return d})),r.d(t,"A",(function(){return p})),r.d(t,"m",(function(){return w})),r.d(t,"C",(function(){return g})),r.d(t,"t",(function(){return f})),r.d(t,"w",(function(){return m})),r.d(t,"q",(function(){return v})),r.d(t,"r",(function(){return h})),r.d(t,"s",(function(){return O})),r.d(t,"j",(function(){return j})),r.d(t,"I",(function(){return y})),r.d(t,"N",(function(){return _})),r.d(t,"p",(function(){return k})),r.d(t,"o",(function(){return R})),r.d(t,"F",(function(){return E})),r.d(t,"c",(function(){return P})),r.d(t,"u",(function(){return S})),r.d(t,"v",(function(){return C})),r.d(t,"Q",(function(){return x})),r.d(t,"H",(function(){return L})),r.d(t,"a",(function(){return T})),r.d(t,"K",(function(){return D})),r.d(t,"b",(function(){return I})),r.d(t,"J",(function(){return M})),r.d(t,"h",(function(){return A})),r.d(t,"L",(function(){return F})),r.d(t,"g",(function(){return V})),r.d(t,"i",(function(){return z})),r.d(t,"E",(function(){return G})),r.d(t,"D",(function(){return W})),r.d(t,"P",(function(){return J})),r.d(t,"O",(function(){return Q})),r.d(t,"d",(function(){return U})),r.d(t,"e",(function(){return q})),r.d(t,"f",(function(){return K})),r.d(t,"R",(function(){return X})),r.d(t,"S",(function(){return Z}));var n=r(3),o=Object(n.getSetting)("currentUserIsAdmin",!1),c=Object(n.getSetting)("reviewRatingsEnabled",!0),i=Object(n.getSetting)("showAvatars",!0),a=Object(n.getSetting)("max_columns",6),s=Object(n.getSetting)("min_columns",1),l=Object(n.getSetting)("default_columns",3),u=Object(n.getSetting)("max_rows",6),b=Object(n.getSetting)("min_rows",1),d=Object(n.getSetting)("default_rows",3),p=Object(n.getSetting)("min_height",500),w=Object(n.getSetting)("default_height",500),g=Object(n.getSetting)("placeholderImgSrc",""),f=(Object(n.getSetting)("thumbnail_size",300),Object(n.getSetting)("isLargeCatalog")),m=Object(n.getSetting)("limitTags"),v=Object(n.getSetting)("hasProducts",!0),h=Object(n.getSetting)("hasTags",!0),O=Object(n.getSetting)("homeUrl",""),j=Object(n.getSetting)("couponsEnabled",!0),y=Object(n.getSetting)("shippingEnabled",!0),_=Object(n.getSetting)("taxesEnabled",!0),k=Object(n.getSetting)("displayItemizedTaxes",!1),R=(Object(n.getSetting)("displayShopPricesIncludingTax",!1),Object(n.getSetting)("displayCartPricesIncludingTax",!1)),E=Object(n.getSetting)("productCount",0),P=Object(n.getSetting)("attributes",[]),S=Object(n.getSetting)("isShippingCalculatorEnabled",!0),C=Object(n.getSetting)("isShippingCostHidden",!1),N=Object(n.getSetting)("woocommerceBlocksPhase",1),x=Object(n.getSetting)("wcBlocksAssetUrl",""),L=Object(n.getSetting)("shippingCountries",{}),T=Object(n.getSetting)("allowedCountries",{}),D=Object(n.getSetting)("shippingStates",{}),I=Object(n.getSetting)("allowedStates",{}),M=Object(n.getSetting)("shippingMethodsExist",!1),A=Object(n.getSetting)("checkoutShowLoginReminder",!0),B={id:0,title:"",permalink:""},H=Object(n.getSetting)("storePages",{shop:B,cart:B,checkout:B,privacy:B,terms:B}),F=H.shop.permalink,V=H.checkout.id,z=H.checkout.permalink,G=H.privacy.permalink,W=H.privacy.title,J=H.terms.permalink,Q=H.terms.title,U=H.cart.id,q=H.cart.permalink,K=Object(n.getSetting)("checkoutAllowsGuest",!1),Y=(Object(n.getSetting)("checkoutAllowsSignup",!1),r(15)),X=function(e,t){if(N>2)return Object(Y.registerBlockType)(e,t)},Z=function(e,t){if(N>1)return Object(Y.registerBlockType)(e,t)}},58:function(e,t,r){"use strict";var n=r(8),o=r.n(n),c=r(14),i=r.n(c),a=r(9);r(2);function s(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}t.a=function(e){var t=e.srcElement,r=e.size,n=void 0===r?24:r,c=i()(e,["srcElement","size"]);return Object(a.isValidElement)(t)&&Object(a.cloneElement)(t,function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?s(Object(r),!0).forEach((function(t){o()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):s(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({width:n,height:n},c))}},6:function(e,t){!function(){e.exports=this.lodash}()},71:function(e,t,r){"use strict";var n=r(10),o=r.n(n),c=r(23),i=r.n(c),a=r(26),s=r.n(a),l=r(20),u=r.n(l),b=r(24),d=r.n(b),p=r(25),w=r.n(p),g=r(12),f=r.n(g),m=r(0),v=r(6),h=r(7),O=r.n(h),j=r(4),y=r(21);r(170);function _(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=f()(e);if(t){var o=f()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return w()(this,r)}}var k=function(e){d()(r,e);var t=_(r);function r(){var e;return i()(this,r),(e=t.apply(this,arguments)).onClick=e.onClick.bind(u()(e)),e}return s()(r,[{key:"onClick",value:function(e){this.props.onChange&&this.props.onChange(e.target.value)}},{key:"render",value:function(){var e,t=this,r=this.props,n=r.label,c=r.checked,i=r.instanceId,a=r.className,s=r.help,l=r.options,u=r.value,b="inspector-toggle-button-control-".concat(i);return s&&(e=Object(v.isFunction)(s)?s(c):s),Object(m.createElement)(j.BaseControl,{id:b,help:e,className:O()("components-toggle-button-control",a)},Object(m.createElement)("label",{id:b+"__label",htmlFor:b,className:"components-toggle-button-control__label"},n),Object(m.createElement)(j.ButtonGroup,{"aria-labelledby":b+"__label"},l.map((function(e,r){var c={};return u===e.value?(c.isPrimary=!0,c["aria-pressed"]=!0):(c.isDefault=!0,c["aria-pressed"]=!1),Object(m.createElement)(j.Button,o()({key:"".concat(e.label,"-").concat(e.value,"-").concat(r),value:e.value,onClick:t.onClick,"aria-label":n+": "+e.label},c),e.label)}))))}}]),r}(m.Component);t.a=Object(y.withInstanceId)(k)},78:function(e,t,r){"use strict";r.d(t,"c",(function(){return s})),r.d(t,"b",(function(){return l})),r.d(t,"a",(function(){return u}));var n=r(13),o=r.n(n),c=r(7),i=r.n(c),a=r(5),s=function(e){if(a.G){if("lowest-rating"===e)return{order:"asc",orderby:"rating"};if("highest-rating"===e)return{order:"desc",orderby:"rating"}}return{order:"desc",orderby:"date_gmt"}},l=function(e){return o()({path:"/wc/store/products/reviews?"+Object.entries(e).map((function(e){return e.join("=")})).join("&"),parse:!1}).then((function(e){return e.json().then((function(t){return{reviews:t,totalReviews:parseInt(e.headers.get("x-wp-total"),10)}}))}))},u=function(e,t){var r=t.className,n=t.showReviewDate,o=t.showReviewerName,c=t.showReviewContent,a=t.showProductName,s=t.showReviewImage,l=t.showReviewRating;return i()(e,r,{"has-image":s,"has-name":o,"has-date":n,"has-rating":l,"has-content":c,"has-product-name":a})}},868:function(e,t,r){"use strict";r.r(t);var n=r(8),o=r.n(n),c=r(0),i=r(1),a=r(15),s=r(58),l=r(60),u=Object(c.createElement)(l.a,{xmlns:"http://www.w3.org/2000/SVG",viewBox:"0 0 24 24"},Object(c.createElement)("path",{fill:"none",d:"M0 0h24v24H0V0z"}),Object(c.createElement)("path",{d:"M15 4v7H5.17l-.59.59-.58.58V4h11m1-2H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm5 4h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1z"})),b=(r(171),r(22)),d=r(4),p=(r(2),r(180)),w=function(){return Object(c.createElement)(d.Placeholder,{className:"wc-block-all-reviews",icon:Object(c.createElement)(s.a,{srcElement:u,className:"block-editor-block-icon"}),label:Object(i.__)("All Reviews","woo-gutenberg-products-block")},Object(i.__)("This block shows a list of all product reviews. Your store does not have any reviews yet, but they will show up here when it does.","woo-gutenberg-products-block"))},g=r(135),f=function(e){var t=e.attributes,r=e.setAttributes;return Object(c.createElement)(c.Fragment,null,Object(c.createElement)(b.InspectorControls,{key:"inspector"},Object(c.createElement)(d.PanelBody,{title:Object(i.__)("Content","woo-gutenberg-products-block")},Object(c.createElement)(d.ToggleControl,{label:Object(i.__)("Product name","woo-gutenberg-products-block"),checked:t.showProductName,onChange:function(){return r({showProductName:!t.showProductName})}}),Object(g.b)(t,r)),Object(c.createElement)(d.PanelBody,{title:Object(i.__)("List Settings","woo-gutenberg-products-block")},Object(g.c)(t,r))),Object(c.createElement)(p.a,{attributes:t,className:"wc-block-all-reviews",icon:Object(c.createElement)(s.a,{icon:u,className:"block-editor-block-icon"}),name:Object(i.__)("All Reviews","woo-gutenberg-products-block"),noReviewsPlaceholder:w}))},m=r(176),v=r(177),h=r(153);function O(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function j(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?O(Object(r),!0).forEach((function(t){o()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):O(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}Object(a.registerBlockType)("woocommerce/all-reviews",{title:Object(i.__)("All Reviews","woo-gutenberg-products-block"),icon:{src:Object(c.createElement)(s.a,{srcElement:u}),foreground:"#96588a"},category:"woocommerce",keywords:[Object(i.__)("WooCommerce","woo-gutenberg-products-block")],description:Object(i.__)("Show a list of all product reviews.","woo-gutenberg-products-block"),supports:{html:!1},example:j(j({},h.a),{},{attributes:j(j({},h.a.attributes),{},{showProductName:!0})}),attributes:j(j({},m.a),{},{showProductName:{type:"boolean",default:!0}}),edit:function(e){return Object(c.createElement)(f,e)},save:v.a})},9:function(e,t){!function(){e.exports=this.React}()},91:function(e,t,r){"use strict";var n=r(0),o=r(1),c=(r(2),r(58)),i=r(141),a=r(7),s=r.n(a),l=r(4),u=r(49);r(144);t.a=function(e){var t=e.className,r=e.error,a=e.isLoading,b=e.onRetry;return Object(n.createElement)(l.Placeholder,{icon:Object(n.createElement)(c.a,{srcElement:i.a}),label:Object(o.__)("Sorry, an error occurred","woo-gutenberg-products-block"),className:s()("wc-block-api-error",t)},Object(n.createElement)(u.a,{error:r}),b&&Object(n.createElement)(n.Fragment,null,a?Object(n.createElement)(l.Spinner,null):Object(n.createElement)(l.Button,{isDefault:!0,onClick:b},Object(o.__)("Retry","woo-gutenberg-products-block"))))}}});