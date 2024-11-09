@extends('frontend.layouts.template')

@section('content')

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Contact Info</h2>
                        <p>Kami senang mendengar dari Anda! Jangan ragu untuk menghubungi kami melalui informasi di bawah ini. Tim kami siap membantu Anda dengan pertanyaan, saran, atau kebutuhan lainnya.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>Jl. Sabuk Alu No.3, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td>(62) 813 2834 4002</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>saluamana03@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Fax:</td>
                                    <td>(+62) 812-6655-7555</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your Email">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Your Message"></textarea>
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map">
                {{-- <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=alun alun wonosobo&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://sprunkin.com/">Sprunki Incredibox</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style> --}}
               <iframe width="600" height="450" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=https%3A%2F%2Fwww.google.com%2Fmaps%2Fplace%2FSalu%2BAmana%2BResidence%2F%40-7.3581284%2C109.9051248%2C19z%2Fdata%3D!4m6!3m5!1s0x2e7aa1007776e0d3%3A0xca5dd0faad7c2a77!8m2!3d-7.3575503!4d109.9059193!16s%252Fg%252F11wn0lnvcf%3Fentry%3Dttu%26g_ep%3DEgoyMDI0MTEwNi4wIKXMDSoASAFQAw%253D%253D&zoom=10&maptype=roadmap"></iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
