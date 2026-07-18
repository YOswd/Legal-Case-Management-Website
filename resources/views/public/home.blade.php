@extends('layouts.public')

@section('content')

<!-- ================= HERO ================= -->

<section class="relative overflow-hidden">

    <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950"></div>

    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-600/20 rounded-full blur-[120px]"></div>

    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-700/20 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 py-28 relative z-10">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>

                <span
                    class="inline-block px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-300 text-sm font-semibold mb-8">

                    🇧🇩 Digital Judicial Case Management System

                </span>

                <h1 class="text-6xl lg:text-7xl font-extrabold leading-tight text-white">

                    Justice

                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">

                        Made Digital

                    </span>

                </h1>

                <p class="mt-8 text-xl text-slate-300 leading-relaxed">

                    A modern judicial platform connecting Citizens,
                    Lawyers and Court Clerks for secure case filing,
                    hearing scheduling, judgment publication and appeal
                    management — all from one place.

                </p>

                <div class="mt-10 flex flex-col sm:flex-row gap-5">

                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-4 rounded-xl font-semibold transition shadow-lg shadow-indigo-500/40">

                        Get Started

                    </a>

                    <a href="{{ route('lawyers.index') }}"
                       class="border border-white/20 bg-white/5 hover:bg-white/10 text-white px-8 py-4 rounded-xl font-semibold transition">

                        Find Lawyers

                    </a>

                </div>

            </div>

            <div>

                <div class="relative">

                    <div
                        class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl rotate-3 blur-xl opacity-40">
                    </div>

                    <div
                        class="relative rounded-3xl overflow-hidden border border-white/10 shadow-2xl">

                        <img
                            src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-[520px] object-cover">

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= STATISTICS ================= -->

<section class="py-20 border-y border-white/10 bg-black/20 backdrop-blur-md">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="text-center">

                <h2
                    class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-white">

                    {{ $clientCount }}+

                </h2>

                <p class="mt-3 text-slate-400">

                    Registered Citizens

                </p>

            </div>

            <div class="text-center">

                <h2
                    class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-white">

                    {{ $lawyerCount }}+

                </h2>

                <p class="mt-3 text-slate-400">

                    Verified Lawyers

                </p>

            </div>

            <div class="text-center">

                <h2
                    class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-white">

                    {{ $caseCount }}+

                </h2>

                <p class="mt-3 text-slate-400">

                    Active Legal Cases

                </p>

            </div>

            <div class="text-center">

                <h2
                    class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-white">

                    24/7

                </h2>

                <p class="mt-3 text-slate-400">

                    Digital Court Access

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ================= JUDICIAL SERVICES ================= -->

<section class="py-24 relative z-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <span
                class="inline-block px-4 py-2 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-sm font-semibold mb-5">

                Our Platform

            </span>

            <h2 class="text-4xl lg:text-5xl font-extrabold text-white">

                Complete Digital Judiciary Services

            </h2>

            <p class="text-slate-400 mt-4 text-lg max-w-2xl mx-auto">

                Manage legal cases, court procedures and judicial activities
                through one secure and efficient platform.

            </p>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">


            <!-- Service 1 -->

            <div
                class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 transition backdrop-blur-xl">

                <div
                    class="w-14 h-14 rounded-2xl bg-blue-500/20 flex items-center justify-center mb-6">

                    <span class="text-3xl">
                        ⚖️
                    </span>

                </div>


                <h3 class="text-xl font-bold text-white mb-3">

                    Case Filing

                </h3>


                <p class="text-slate-400 leading-relaxed">

                    Citizens can submit legal cases with supporting documents
                    and track their progress digitally.

                </p>

            </div>



            <!-- Service 2 -->


            <div
                class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 transition backdrop-blur-xl">


                <div
                    class="w-14 h-14 rounded-2xl bg-indigo-500/20 flex items-center justify-center mb-6">

                    <span class="text-3xl">
                        📅
                    </span>

                </div>


                <h3 class="text-xl font-bold text-white mb-3">

                    Hearing Management

                </h3>


                <p class="text-slate-400 leading-relaxed">

                    Court officials can schedule hearings, update dates
                    and maintain judicial records.

                </p>


            </div>



            <!-- Service 3 -->


            <div
                class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 transition backdrop-blur-xl">


                <div
                    class="w-14 h-14 rounded-2xl bg-purple-500/20 flex items-center justify-center mb-6">

                    <span class="text-3xl">
                        📂
                    </span>

                </div>


                <h3 class="text-xl font-bold text-white mb-3">

                    Document Management

                </h3>


                <p class="text-slate-400 leading-relaxed">

                    Securely store, access and review legal documents
                    submitted by clients and lawyers.

                </p>


            </div>



            <!-- Service 4 -->


            <div
                class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 transition backdrop-blur-xl">


                <div
                    class="w-14 h-14 rounded-2xl bg-green-500/20 flex items-center justify-center mb-6">

                    <span class="text-3xl">
                        🏛️
                    </span>

                </div>


                <h3 class="text-xl font-bold text-white mb-3">

                    Judgments & Appeals

                </h3>


                <p class="text-slate-400 leading-relaxed">

                    Publish judgments, manage appeals and provide transparent
                    access to case decisions.

                </p>


            </div>


        </div>


    </div>


</section>

<!-- ================= CALL TO ACTION ================= -->

<section class="py-24 relative z-10">

    <div class="max-w-7xl mx-auto px-6">

        <div
            class="relative overflow-hidden rounded-3xl p-12 lg:p-16 text-center border border-indigo-500/30 bg-gradient-to-r from-blue-950 via-indigo-900 to-purple-950 shadow-2xl">


            <!-- Decorative Background -->

            <div
                class="absolute -top-20 -right-20 w-96 h-96 bg-blue-500/20 rounded-full blur-[100px]">
            </div>


            <div
                class="absolute -bottom-20 -left-20 w-96 h-96 bg-indigo-500/20 rounded-full blur-[100px]">
            </div>



            <div class="relative z-10">


                <span
                    class="inline-block px-4 py-2 rounded-full bg-white/10 border border-white/20 text-blue-200 text-sm font-medium mb-6">

                    Digital Justice Platform

                </span>



                <h2
                    class="text-4xl lg:text-5xl font-extrabold text-white mb-6">

                    Experience The Future Of Judiciary

                </h2>



                <p
                    class="text-indigo-200 text-lg max-w-3xl mx-auto mb-10 leading-relaxed">

                    Join our digital judicial ecosystem where citizens,
                    lawyers and court officials can manage legal proceedings
                    faster, safer and more transparently.

                </p>



                <div class="flex flex-col sm:flex-row justify-center gap-5">


                    <a href="{{ route('register') }}"
                       class="bg-white text-indigo-900 px-8 py-4 rounded-xl font-bold hover:bg-slate-100 transition shadow-xl">

                        Create Citizen Account

                    </a>



                    <a href="{{ route('login') }}"
                       class="bg-white/10 border border-white/20 text-white px-8 py-4 rounded-xl font-semibold hover:bg-white/20 transition">

                        Login To System

                    </a>


                </div>


            </div>


        </div>


    </div>


</section>


@endsection