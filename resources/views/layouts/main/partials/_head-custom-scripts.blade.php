

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    indigo: {
                        50: "#eef2ff",
                        100: "#e0e7ff",
                        500: "#6366f1",
                        600: "#4f46e5",
                        700: "#4338ca",
                    },
                    purple: {
                        50: "#faf5ff",
                        500: "#a855f7",
                        600: "#9333ea",
                        700: "#7e22ce",
                    },
                },
                animation: {
                    fadeIn: "fadeIn 0.5s ease-in forwards",
                    slideIn: "slideIn 0.3s ease-out forwards",
                },
                keyframes: {
                    fadeIn: {
                        from: { opacity: 0, transform: "translateY(10px)" },
                        to: { opacity: 1, transform: "translateY(0)" },
                    },
                    slideIn: {
                        from: { opacity: 0, transform: "translateX(-10px)" },
                        to: { opacity: 1, transform: "translateX(0)" },
                    },
                },
            },
        },
    };
</script>

