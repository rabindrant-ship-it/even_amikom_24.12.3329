@extends('layouts.app')
@section('title', 'Home - Selamat Datang')

@section('content')

    <section class="max-w-7xl mx-auto px-6 py-20 flex flex-col lg:flex-row items-center gap-16">
        <div class="flex-1 order-2 lg:order-1 space-y-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-black uppercase tracking-widest">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                </span>
                Platform Event Terpercaya
            </div>

            <h1 class="text-5xl md:text-6xl font-black text-slate-900 leading-[1.1]">
                Cari Pengalaman <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Seru di Sekitarmu.</span>
            </h1>

            <p class="text-lg text-slate-600 max-w-md leading-relaxed">
                Akses mudah ke berbagai konser, seminar, dan workshop pilihan. 
                Transaksi aman, tiket langsung masuk ke emailmu.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="#explore"
                    class="px-10 py-4 bg-slate-900 text-white rounded-xl font-bold text-center hover:bg-indigo-600 hover:shadow-2xl hover:shadow-indigo-200 transition-all duration-300">
                    Jelajahi Sekarang
                </a>
                <a href="#"
                    class="px-10 py-4 bg-white border-2 border-slate-200 text-slate-700 rounded-xl font-bold text-center hover:border-slate-900 transition-all">
                    Pusat Bantuan
                </a>
            </div>
        </div>

        <div class="flex-1 order-1 lg:order-2 relative">
            <div class="absolute -top-6 -right-6 w-32 h-32 bg-indigo-200 rounded-full blur-3xl opacity-50"></div>
            
            <div class="relative overflow-hidden rounded-[2.5rem] border-[8px] border-white shadow-2xl">
                <img src="assets/concert.png" alt="Featured Event"
                    class="w-full object-cover aspect-[4/5] hover:scale-105 transition-transform duration-700">
                
                <div class="absolute bottom-6 left-6 right-6 p-5 bg-white/80 backdrop-blur-md rounded-2xl border border-white/50 shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="p-2 bg-indigo-600 rounded-lg text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04a11.357 11.357 0 00-1.573 1.831c-.8 1.133-1.241 2.484-1.241 3.872c0 3.84 2.504 7.513 6.13 9.464l.87.468l.87-.468c3.626-1.951 6.13-5.624 6.13-9.464c0-1.388-.441-2.739-1.241-3.872a11.357 11.357 0 00-1.573-1.831z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-indigo-600 font-black uppercase tracking-tighter">Verified Payment</p>
                            <p class="text-sm font-bold text-slate-800">Pembayaran Instan via Midtrans</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="explore" class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-100">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="space-y-2">
                <h2 class="text-3xl font-black text-slate-900">Event Terdekat</h2>
                <p class="text-slate-500 font-medium">Temukan aktivitas menarik berdasarkan minatmu.</p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="/" 
                   class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 {{ !request('category') ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-100' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    Semua Event
                </a>

                @foreach($categories as $cat)
                    <a href="/?category={{ $cat->slug }}"
                       class="px-6 py-2.5 rounded-full text-sm font-bold border-2 transition-all duration-300 {{ request('category') == $cat->slug ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-transparent bg-slate-100 text-slate-600 hover:border-slate-300 hover:bg-white' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($events as $event)
                <div class="group relative bg-white rounded-[2rem] overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500">
                    <div class="relative aspect-[4/5] overflow-hidden">
                        <img src="https://placehold.co/600x800" 
                             alt="{{ $event->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        <div class="absolute top-5 left-5">
                            <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-indigo-600 text-xs font-black rounded-lg uppercase shadow-sm">
                                {{ $event->category->name }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center gap-2 text-slate-400 text-xs font-bold mb-3 uppercase tracking-widest">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }} • {{ \Carbon\Carbon::parse($event->date)->format('H:i') }}
                        </div>

                        <h3 class="text-xl font-extrabold text-slate-900 mb-6 line-clamp-2 group-hover:text-indigo-600 transition">
                            {{ $event->title }}
                        </h3>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Mulai Dari</p>
                                <p class="text-xl font-black text-slate-900">
                                    Rp{{ number_format($event->price, 0, ',', '.') }}
                                </p>
                            </div>
                            
                            <a href="{{ url('event/'.$event->id) }}" 
                               class="inline-flex items-center justify-center w-12 h-12 bg-slate-50 text-slate-900 rounded-full group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection