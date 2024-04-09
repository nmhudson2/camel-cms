<span class="bg-gray-200 p-1 rounded shadow-lg absolute bottom-0 left-0 right-0 w-[90%] m-auto ">
    <ul class="flex flex-row justify-between items-center ">
        <li><a href="{{route('profile.show')}}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{route('editor.page_slug',['exists'=>'false','page_meta'=>null])}}"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="63" viewBox="0 0 48 63" fill="none">
                    <path d="M0.5 60.82V2.68C0.5 2.04429 0.5 1.72643 0.639258 1.49096C0.725 1.34598 0.845976 1.225 0.990959 1.13926C1.22643 1 1.54429 1 2.18 1H30.8887C31.1332 1 31.2554 1 31.3712 1.02802C31.4437 1.04554 31.5139 1.0711 31.5807 1.10422C31.6874 1.15721 31.7811 1.23573 31.9683 1.39279L31.9683 1.3928L46.3996 13.4964L46.3996 13.4965C46.638 13.6964 46.7572 13.7963 46.8386 13.9217C46.8894 13.9999 46.929 14.0848 46.9563 14.174C47 14.317 47 14.4725 47 14.7836V60.82C47 61.4557 47 61.7736 46.8607 62.009C46.775 62.154 46.654 62.275 46.509 62.3607C46.2736 62.5 45.9557 62.5 45.32 62.5H2.18C1.54429 62.5 1.22643 62.5 0.990959 62.3607C0.845976 62.275 0.725 62.154 0.639258 62.009C0.5 61.7736 0.5 61.4557 0.5 60.82Z" fill="#D9D9D9" stroke="black" />
                    <path d="M31 1.5V14H46.5" stroke="black" />
                    <path d="M6 20H43V22H6V20Z" fill="#BFBFBF" />
                    <path d="M6 34H43V36H6V34Z" fill="#BFBFBF" />
                    <path d="M6 30H43V32H6V30Z" fill="#BFBFBF" />
                    <path d="M6 25H43V27H6V25Z" fill="#BFBFBF" />
                    <path d="M6 39H43V41H6V39Z" fill="#BFBFBF" />
                    <path d="M6 53H43V55H6V53Z" fill="#BFBFBF" />
                    <path d="M6 49H43V51H6V49Z" fill="#BFBFBF" />
                    <path d="M6 44H43V46H6V44Z" fill="#BFBFBF" />
                    <path d="M22.6719 17.9531H26.2344V29.7188H38V33.2344H26.2344V45H22.6719V33.2344H11V29.7188H22.6719V17.9531Z" fill="black" />
                </svg></a></li>
        <li><a href="{{route('settings.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="60" viewBox="0 0 72 72" fill="none">
                    <path d="M32 10V1H41V10H32Z" fill="#D9D9D9" stroke="black" />
                    <path d="M32 71V62H41V71H32Z" fill="#D9D9D9" stroke="black" />
                    <path d="M15.364 19.7272L9 13.3633L15.364 6.99932L21.7279 13.3633L15.364 19.7272Z" fill="#D9D9D9" stroke="black" />
                    <path d="M58.4968 62.8601L52.1328 56.4961L58.4968 50.1321L64.8607 56.4961L58.4968 62.8601Z" fill="#D9D9D9" stroke="black" />
                    <path d="M50.1321 13.364L56.4961 7L62.8601 13.364L56.4961 19.7279L50.1321 13.364Z" fill="#D9D9D9" stroke="black" />
                    <path d="M6.99932 56.4968L13.3633 50.1328L19.7272 56.4968L13.3633 62.8607L6.99932 56.4968Z" fill="#D9D9D9" stroke="black" />
                    <path d="M10 41H1L1 32H10V41Z" fill="#D9D9D9" stroke="black" />
                    <path d="M71 41H62V32H71V41Z" fill="#D9D9D9" stroke="black" />
                    <circle cx="36" cy="36" r="27.5" fill="#D9D9D9" stroke="black" />
                    <circle cx="36" cy="36" r="12.5" fill="white" stroke="black" />
                </svg></a></li>
    </ul>
</span>