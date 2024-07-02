@extends('layouts.front.template')

@section('content')
    <!-- about -->
    <div style="background-image: url('{{ asset('template/img/about_bg.jpg') }}')">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-7">
                    <div class="titlepage" style="font-size: 80%;">
                        <h2>Tentang Kami</h2>
                        <p>Selamat datang di <strong>WeddOR</strong>, solusi terpercaya untuk merencanakan pernikahan impian Anda! Kami adalah platform e-commerce wedding organizer online yang dirancang khusus untuk memudahkan Anda menemukan dan memesan event organizer (EO) pernikahan dengan cepat, lengkap, dan mudah.</p>

                        <h2>Visi Kami</h2>
                        <p>Menjadi platform terdepan dalam industri pernikahan, yang membantu setiap pasangan mewujudkan pernikahan impian mereka dengan cara yang paling efisien dan menyenangkan.</p>

                        <h2>Misi Kami</h2>
                        <ul>
                            <li><strong>Kemudahan Akses:</strong> Memberikan akses mudah dan cepat ke berbagai Vendor EO pernikahan terbaik di seluruh Indonesia, sehingga Anda dapat menemukan layanan yang sesuai dengan kebutuhan dan anggaran Anda.</li>
                            <li><strong>Kelengkapan Informasi:</strong> Menyediakan informasi lengkap mengenai berbagai Vendor EO, termasuk portofolio, paket layanan, harga, dan ulasan dari pelanggan sebelumnya untuk membantu Anda membuat keputusan yang tepat.</li>
                            <li><strong>Keamanan dan Kenyamanan:</strong> Menjamin keamanan transaksi dan memberikan pengalaman pengguna yang nyaman melalui platform yang user-friendly dan responsif.</li>
                            <li><strong>Kepuasan Pelanggan:</strong> Berkomitmen untuk selalu memberikan layanan terbaik dan memastikan kepuasan setiap pelanggan melalui layanan dukungan yang responsif dan profesional.</li>
                        </ul>

                        <h2>Mengapa Memilih Kami?</h2>
                        <ul>
                            <li><strong>Beragam Pilihan Vendor EO:</strong> Kami bekerja sama dengan banyak Vendor EO pernikahan terkemuka yang siap membantu Anda merencanakan hari istimewa Anda.</li>
                            <li><strong>Penelusuran Mudah:</strong> Dengan fitur pencarian yang canggih dan filter yang intuitif, Anda dapat dengan mudah menemukan EO yang sesuai dengan keinginan Anda.</li>
                            <li><strong>Informasi Transparan:</strong> Semua informasi yang Anda butuhkan tersedia dengan jelas, mulai dari layanan yang ditawarkan, harga paket, hingga ulasan pelanggan.</li>
                            <li><strong>Dukungan Pelanggan 24/7:</strong> Tim dukungan kami siap membantu Anda kapan saja, memastikan Anda mendapatkan bantuan yang Anda butuhkan setiap saat.</li>
                        </ul>

                        <p>Di <strong>[Nama Platform]</strong>, kami memahami bahwa pernikahan adalah momen yang sangat spesial. Oleh karena itu, kami berusaha memberikan yang terbaik untuk membantu Anda menciptakan momen yang tak terlupakan. Temukan EO pernikahan impian Anda bersama kami dan wujudkan pernikahan yang Anda impikan dengan mudah dan menyenangkan.</p>

                        <p>Terima kasih telah memilih <strong>WeddOR</strong> sebagai partner pernikahan Anda. Kami siap membantu Anda di setiap langkah menuju hari istimewa Anda.</p>

                        <h2>Hubungi Kami</h2>
                        <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi tim dukungan kami melalui <a href="mailto:info@example.com">email</a> atau telepon di <a href="tel:+6281234567890">+62 812-3456-7890</a>.</p>

                        <p>Selamat merencanakan pernikahan Anda!</p>
                        <a class="read_more" href="Javascript:void(0)"> Read More</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about_img">
                        <figure><img src="{{ asset('template/img/about.png') }}" style="margin-left: -10px;"/></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
@endsection
