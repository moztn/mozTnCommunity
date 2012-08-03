/**
 * Copyright (C) 2006-2009, QuietAffiliate.com. All rights reserved.
 *
 * Script Name: Countdown Redirect
 *
 * THIS SOURCE CODE MAY BE USED FREELY PROVIDED THAT
 * YOU DO NOT REMOVE THIS MESSAGE.
 *
 * You can obtain this script at http://www.QuietAffiliate.com
 */

function countdownRedirect(url, msg,temp)
{
   var TARG_ID = "COUNTDOWN_REDIRECT";
   var DEF_MSG = "Redirecting...";

   if( ! msg )
   {
      msg = DEF_MSG;
   }

   if( ! url )
   {
      throw new Error('You didn\'t include the "url" parameter');
   }


   var e = document.getElementById(TARG_ID);

   if( ! e )
   {
      throw new Error('"COUNTDOWN_REDIRECT" element id not found');
   }

   var cTicks = parseInt(e.innerHTML);

   var timer = setInterval(function()
   {
      if( cTicks )
      {
         e.innerHTML = --cTicks;
      }
      else
      {
         clearInterval(timer);
         document.body.innerHTML = msg;
         location = url;	  
      }

   }, temp);
}