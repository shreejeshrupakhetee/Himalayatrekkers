@empty(!$v->icon)
    @if ($v->icon == 1)



        <span class="icon-plane text-sm md:text-lg text-regal-red text-center" aria-hidden="true"></span>



    @elseif ($v->icon == 2)


        <span title="Private car" class="icon-car text-sm md:text-lg text-regal-red text-center" aria-hidden="true"></span>


    @elseif ($v->icon == 3)

        <span title="Tourist Bus car" class="icon-bus text-sm md:text-lg text-regal-green text-center"
            aria-hidden="true"></span>
    @elseif ($v->icon == 4)

        <span title="Trekking / Hiking" class="icon-hiking text-sm md:text-lg text-regal-green text-center"
            aria-hidden="true"></span>
    @elseif ($v->icon == 7)


        <svg class="inline-block h-5 w-5" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#38A169" viewBox="0 0 495.832 495.832"
            style="enable-background:new 0 0 495.832 495.832;" xml:space="preserve">
            <title>camping</title>
            <path id="XMLID_92_" d="M478.746,459.359h-16.113l-21.445-114.389c-6.252-33.233-21.35-64.156-43.746-89.492l-136.713-154.67V83.047
               l91.156-23.182c1.939-0.485,3.264-2.196,3.264-4.159c0-1.978-1.324-3.681-3.246-4.173l-91.174-23.188V15.117
               c0-7.072-5.734-12.813-12.822-12.813c-7.057,0-12.805,5.74-12.805,12.813v85.691L98.389,255.479
               c-22.383,25.336-37.51,56.26-43.744,89.492L33.197,459.359H17.1c-9.447,0-17.1,7.653-17.1,17.085c0,9.43,7.652,17.083,17.1,17.083
               h134.613h192.404h134.629c9.447,0,17.086-7.653,17.086-17.083C495.832,467.013,488.193,459.359,478.746,459.359z M151.713,459.359
               v-52.781c0-10.617,2.711-21.059,7.863-30.336l75.525-135.855v218.973H151.713z M260.728,459.359V240.332l75.527,135.91
               c5.164,9.277,7.861,19.719,7.861,30.336v52.781H260.728z" />
        </svg>



    @else

        <svg stroke="#38A169" fill="#38A169" class="inline-block h-6 w-6" version="1.1" id="Capa_1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 512.015 512.015" style="enable-background:new 0 0 512.015 512.015;" xml:space="preserve">
            <title>Helicopter</title>


            <path stroke-width="4" d="M42.682,181.341c-23.531,0-42.667,19.136-42.667,42.667s19.136,42.667,42.667,42.667
                   c23.531,0,42.667-19.136,42.667-42.667S66.213,181.341,42.682,181.341z M42.682,245.341c-11.776,0-21.333-9.579-21.333-21.333
                   s9.557-21.333,21.333-21.333s21.333,9.579,21.333,21.333S54.458,245.341,42.682,245.341z" />



            <path d="M348.005,202.802l-18.453-36.907c-1.813-3.605-5.504-5.888-9.536-5.888h-32c-2.837,0-5.547,1.131-7.531,3.115
                   l-39.552,39.552H74.682c-5.888,0-10.667,4.779-10.667,10.667c0,5.845,4.715,10.603,10.517,10.667
                   c-5.056,0.064-9.515,3.733-10.368,8.917c-0.981,5.803,2.965,11.307,8.768,12.267c39.083,6.507,105.621,22.528,120.896,38.251
                   l0.683,1.344c20.16,39.467,45.269,88.555,93.504,88.555h149.333c42.56,0,74.667-22.933,74.667-53.333
                   C512.015,287.709,439.845,206.6,348.005,202.802z M437.349,352.008H288.015c-35.179,0-56.085-40.875-74.496-76.928l-1.344-2.603
                   c-0.384-0.725-0.853-1.429-1.387-2.069c-23.189-27.051-123.051-44.373-134.357-46.251c-0.512-0.107-1.067-0.149-1.579-0.149
                   h170.496c2.837,0,5.547-1.131,7.531-3.115l39.552-39.552h20.992l18.389,36.779c1.813,3.605,5.504,5.888,9.536,5.888
                   c87.509,0,149.333,80.043,149.333,96C490.682,337.65,466.767,352.008,437.349,352.008z" />

            <path d="M490.682,309.32h-85.589c-14.251,0-26.581-9.173-30.677-22.805l-22.869-76.267c-1.685-5.632-7.637-8.832-13.269-7.147
                   c-5.653,1.707-8.853,7.659-7.147,13.291l22.869,76.267c6.827,22.741,27.371,38.016,51.093,38.016h85.589
                   c5.888,0,10.667-4.8,10.667-10.688S496.57,309.32,490.682,309.32z" />

            <path d="M63.226,188.552l-21.333-42.667c-2.539-5.056-8.597-7.253-13.781-5.013l-21.675,9.344
                   c-5.077,2.176-7.637,7.893-5.888,13.163l10.667,32c1.899,5.589,7.957,8.597,13.504,6.741c5.589-1.856,8.619-7.893,6.741-13.504
                   l-7.573-22.699l3.413-1.472l16.853,33.685c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.384,4.757-1.131
                   C63.717,200.242,65.85,193.842,63.226,188.552z" />

            <path d="M58.127,246.45c-5.248-2.581-11.669-0.491-14.315,4.779l-1.344,2.667c-0.981-4.885-5.291-8.555-10.453-8.555
                   c-5.888,0-10.667,4.779-10.667,10.667v21.333c0,5.888,4.779,10.667,10.667,10.667h10.667c4.032,0,7.723-2.283,9.557-5.909
                   l10.667-21.333C65.53,255.496,63.397,249.096,58.127,246.45z" />

            <path d="M309.349,96.008c-5.888,0-10.667,4.779-10.667,10.667v10.667c0,5.888,4.779,10.667,10.667,10.667
                   s10.667-4.779,10.667-10.667v-10.667C320.015,100.786,315.237,96.008,309.349,96.008z" />

            <path d="M501.349,117.341h-192c-5.888,0-10.667,4.779-10.667,10.667s4.779,10.667,10.667,10.667h192
                   c5.888,0,10.667-4.779,10.667-10.667S507.237,117.341,501.349,117.341z" />

            <path d="M309.349,117.341h-192c-5.888,0-10.667,4.779-10.667,10.667s4.779,10.667,10.667,10.667h192
                   c5.888,0,10.667-4.779,10.667-10.667S315.237,117.341,309.349,117.341z" />

            <path d="M352.015,352.008c-5.888,0-10.667,4.779-10.667,10.667v42.667c0,5.888,4.779,10.667,10.667,10.667
                   c5.888,0,10.667-4.779,10.667-10.667v-42.667C362.682,356.786,357.903,352.008,352.015,352.008z" />

            <path d="M437.349,352.008c-5.888,0-10.667,4.779-10.667,10.667v42.667c0,5.888,4.779,10.667,10.667,10.667
                   c5.888,0,10.667-4.779,10.667-10.667v-42.667C448.015,356.786,443.237,352.008,437.349,352.008z" />

            <path d="M506.554,374.706c-5.141-2.88-11.648-1.045-14.528,4.096c-5.056,9.024-25.664,14.656-33.344,15.872H245.349
                   c-5.888,0-10.667,4.779-10.667,10.667c0,5.888,4.779,10.667,10.667,10.667l214.805-0.107c3.947-0.555,38.912-5.995,50.496-26.688
                   C513.53,384.072,511.695,377.586,506.554,374.706z" />


        </svg>


    @endif
@endempty
