<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>DR.JEBT</title>
        @yield('page_css')
        @include('admin_layouts.styling')
    </head>
    <body>
    @include('admin_layouts.top_navbar')
        
        <section>
            <div class="mainwrapper">
            @include('admin_layouts.sidebar')
                
                <div class="mainpanel">
                    <div class="contentpanel">
                        @yield('main_content')
                    </div>   
                </div>   
            </div>  
        </section>
        @include('admin_layouts.javascript')
        @yield('page_js')
    </body>
</html>
