// import barba from "@barba/core";
// import barbaCss from "@barba/css";
const preloader = document.querySelector(".preloader");
const navigation = document.querySelector("header");
const resetPreloader = function () {
  preloader.style.width = "0%";
  preloader.style.opacity = "1";
  preloader.style.display = "block";
};
barba.hooks.enter(() => {
  window.scrollTo(0, 0);
});
barba.init({
  sync: true,
  cacheIgnore: true,
  prefetchIgnore: true,
  // timeout: 10000,
  transitions: [
    // {
    //   name: "Ultimativna animacija",
    //   leave() {
    //     const t1 = gsap.timeline();
    //     t1.to(navigation, { y: -150 })
    //       .to(preloader, {
    //         opacity: 1,
    //         // display: flex,
    //         duration: 0.8,
    //         width: "100%",
    //         ease: "power3",
    //       })
    //       .to("#title-preloader-split", {
    //         opacity: 1,
    //         duration:0.4,
    //         y: -120,
    //       })
    //       .from(".split", {
    //         height: "100%",
    //         stagger: 0.1,
    //         // duration: 1,
    //         ease: "power2",
    //         onComplete: () => {
    //           gsap
    //             .timeline()
    //             .to("#title-preloader-split", { opacity: 0, y: 0 })
    //             .to(preloader, {
    //               width: "0%",
    //               opacity: 0,
    //               // display: none,
    //               duration: 1,
    //               ease: "power1",
    //             });
    //         },
    //       });
    //   },
    //   enter(data) {
    //     const t2 = gsap.timeline();
    //     t2.to(navigation, { delay: 1.5, y: 0 }).from(data.next.container, {
    //       y: 100,
    //       opacity: 0,
    //     });
    //   },
    // },
    {
      name: "Fade in Fade out tranzicija",
      leave(data) {
        gsap.to(data.current.container, {
          duration:0.7,
          opacity: 0,
        });
      },
      enter(data) {
        gsap.from(data.next.container, {
          duration:0.7,
          opacity: 0,
        });
      },
    },
  ],
});
